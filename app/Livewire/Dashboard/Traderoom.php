<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Dashboard\Partials\AssetIndicator;
use App\Models\Bot;
use App\Models\Referral;
use App\Models\Strategy;
use App\Models\Trade;
use App\Models\User;
use App\Notifications\CommissionEarned;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.app")]
class Traderoom extends Component
{
    public $activeBot;

    public $timerCheckpoint;

    public $amount;

    public $fee;

    public string $accountType = "";

    public string $strategy = "";

    public string $minProfitLimit = "";

    public string $maxProfitLimit = "";

    public string $profit = "";

    public $previousBotProfit;

    public string $asset = "";

    public string $assetIcon = "";

    public string $assetClass = "";

    public string $sentiment = "";

    public int $botExpirationInHrs;

    public $firstUpline;

    public $secondUpline;

    public int $level = 0;

    public function mount()
    {
        if (session()->has("message")) {
            $message = session()->get("message");
            $this->dispatch("robot-created", message: $message)->self();
        }

        $this->activeBot = Bot::where("user_id", "=", auth()->user()->id, "and")
            ->where("status", "=", "active", "and")
            ->first();

        // RULE:: Do not remove from this position
        if ($this->activeBot === null) {
            $this->redirectRoute("dashboard.robot");
            return;
        }
        // RULE:: Do not remove from this position

        if ($this->activeBot && isset($this->activeBot["end"])) {
            $endString = $this->activeBot["end"];
            // If the timestamp is in milliseconds, convert to seconds
            if (is_numeric($endString) && strlen($endString) >= 13) {
                $endTimestamp = intval($endString) / 1000;
                $endTime = \Carbon\Carbon::createFromTimestamp($endTimestamp);
            } else {
                // Try to parse as Y-m-d H:i:s, fallback to strtotime
                try {
                    $endTime = \Carbon\Carbon::createFromFormat(
                        "Y-m-d H:i:s",
                        $endString,
                    );
                } catch (\Exception $e) {
                    $endTimestamp = strtotime($endString);
                    $endTime = $endTimestamp
                        ? \Carbon\Carbon::createFromTimestamp($endTimestamp)
                        : null;
                }
                // If parsing failed, try Carbon::parse as last resort
                if (empty($endTime)) {
                    try {
                        $endTime = \Carbon\Carbon::parse($endString);
                    } catch (\Exception $e) {
                        $endTime = null;
                    }
                }
            }
            $now = \Carbon\Carbon::now();
            $this->botExpirationInHrs = isset($endTime)
                ? max(0, $now->diffInHours($endTime, false))
                : 0;
        } else {
            $this->botExpirationInHrs = 0;
        }

        $previousBotTrade = Trade::where(
            "user_id",
            "=",
            auth()->user()->id,
            "and",
        )
            ->where("bot_id", "=", $this->activeBot["id"], "and")
            ->latest()
            ->first();

        $this->previousBotProfit = $previousBotTrade
            ? number_format($previousBotTrade["profit"] / 100, 2, ".", ",")
            : 0;

        $this->amount = $this->normalizeAmount($this->activeBot["amount"]);
        $this->accountType =
            $this->activeBot["account_type"] === "demo"
                ? "Demo account"
                : "Live account";

        $strategy = Strategy::find($this->activeBot["strategy"], ["*"]);

        $this->strategy = $strategy["name"];
        $this->minProfitLimit = $strategy["min_roi"];
        $this->maxProfitLimit = $strategy["max_roi"];
        $this->profit = $this->activeBot["profit"];
        $this->fee = $this->calculateFees();
        $this->asset = $this->activeBot["asset"];
        $this->assetClass = $this->activeBot["asset_class"];
        $this->assetIcon = $this->activeBot["asset_image_url"];
        $this->sentiment = $this->activeBot["sentiment"];
        $this->timerCheckpoint = $this->activeBot["timer_checkpoint"];
    }

    public function calculateFees(): int
    {
        $profit = $this->activeBot["profit"];
        $fee = intval(round($profit * (5 / 100)));
        return $fee;
    }

    public function normalizeAmount(int $amount): int|float
    {
        return $amount / 100;
    }

    public function serializeAmount(float $amount): int
    {
        return $amount * 100;
    }

    public function refreshAssetData(): void
    {
        $activeBot = Bot::where("user_id", "=", auth()->user()->id, "and")
            ->where("status", "=", "active", "and")
            ->first();

        if ($activeBot === null) {
            return;
        }

        $previousBotTrade = Trade::where(
            "user_id",
            "=",
            auth()->user()->id,
            "and",
        )
            ->where("bot_id", $this->activeBot["id"])
            ->latest()
            ->first();

        $this->previousBotProfit = $previousBotTrade
            ? number_format($previousBotTrade["profit"] / 100, 2, ".", ",")
            : 0;

        $this->profit = $activeBot["profit"];
        $this->fee = $this->calculateFees();
        $this->asset = $activeBot["asset"];
        $this->assetClass = $activeBot["asset_class"];
        $this->assetIcon = $activeBot["asset_image_url"];
        $this->sentiment = $activeBot["sentiment"];
        $data = [
            "asset" => $activeBot["asset"],
            "assetImageUrl" => $activeBot["asset_image_url"],
            "assetClass" => $activeBot["asset_class"],
            "isBotActive" => true,
        ];
        $this->dispatch("asset-updated", data: $data)->to(
            AssetIndicator::class,
        );
        $this->timerCheckpoint = $activeBot["timer_checkpoint"];
    }

    public function computeUpline(string $referredBy)
    {
        $currentUpline = User::where(
            "referral_code",
            "=",
            $referredBy,
            "and",
        )->first();
        if ($currentUpline !== null) {
            $this->firstUpline = $currentUpline;
            $this->level += 1;
            $currentUpline = User::where(
                "referral_code",
                "=",
                $currentUpline["referred_by"],
                "and",
            )->first();
            if ($currentUpline !== null) {
                $this->secondUpline = $this->firstUpline;
                $this->firstUpline = $currentUpline;
                $this->level += 1;
            }
        }
    }

    public function processReferralPayouts(
        float $robotProfit,
        string $referralCode,
        string $botOwnerName,
    ) {
        try {
            if ($this->level === 1) {
                /**
                 * Top upline commission(12% on trade profits)
                 */
                $commission = intval(round(($robotProfit * 12) / 100));
                $newFirstUplineBalance =
                    $this->firstUpline["live_balance"] + $commission;

                DB::transaction(function () use (
                    $newFirstUplineBalance,
                    $referralCode,
                    $commission,
                ) {
                    User::where(
                        "id",
                        "=",
                        $this->firstUpline["id"],
                        "and",
                    )->update([
                        "live_balance" => $newFirstUplineBalance,
                    ]);
                    Referral::create([
                        "user_id" => $this->firstUpline["id"],
                        "referral_code" => $referralCode,
                        "amount" => $commission,
                        "level" => "1",
                    ]);
                });

                $this->firstUpline->notify(
                    new CommissionEarned(
                        $this->firstUpline["name"],
                        $botOwnerName,
                        strval($this->normalizeAmount($commission)),
                        "trade profit",
                    ),
                );
            }

            if ($this->level === 2) {
                /**
                 * Middle upline commission(12% on trade profits)
                 */
                $commission = intval(round(($robotProfit * 12) / 100));
                $newSecondUplineBalance =
                    $this->secondUpline["live_balance"] + $commission;

                DB::transaction(function () use (
                    $newSecondUplineBalance,
                    $referralCode,
                    $commission,
                ) {
                    User::where(
                        "id",
                        "=",
                        $this->secondUpline["id"],
                        "and",
                    )->update([
                        "live_balance" => $newSecondUplineBalance,
                    ]);
                    Referral::create([
                        "user_id" => $this->secondUpline["id"],
                        "referral_code" => $referralCode,
                        "amount" => $commission,
                        "level" => "1",
                    ]);
                });

                $this->secondUpline->notify(
                    new CommissionEarned(
                        $this->secondUpline["name"],
                        $botOwnerName,
                        strval($this->normalizeAmount($commission)),
                        "trade profit",
                    ),
                );

                /**
                 * First upline commission(8% on trade profits)
                 */
                $commission = intval(round(($robotProfit * 8) / 100));
                $newFirstUplineBalance =
                    $this->firstUpline["live_balance"] + $commission;

                DB::transaction(function () use (
                    $newFirstUplineBalance,
                    $referralCode,
                    $commission,
                ) {
                    User::where(
                        "id",
                        "=",
                        $this->firstUpline["id"],
                        "and",
                    )->update([
                        "live_balance" => $newFirstUplineBalance,
                    ]);
                    Referral::create([
                        "user_id" => $this->firstUpline["id"],
                        "referral_code" => $referralCode,
                        "amount" => $commission,
                        "level" => "2",
                    ]);
                });

                $this->firstUpline->notify(
                    new CommissionEarned(
                        $this->firstUpline["name"],
                        $botOwnerName,
                        strval($this->normalizeAmount($commission)),
                        "trade profit",
                    ),
                );
            }
        } catch (\Exception $e) {
            session()->flash("error-message", $e->getMessage());
        }
    }

    public function stopRobot(): void
    {
        try {
            $accountType = $this->activeBot["account_type"];

            if ($accountType === "demo") {
                $amount = $this->activeBot["amount"];
                $currentBalance = auth()->user()->demo_balance;
                $profit = $this->activeBot["profit"];
                $newBalance = $currentBalance + $amount + $profit;
                $newBalanceMinusFees = $newBalance - $this->fee;

                DB::transaction(function () use ($newBalanceMinusFees) {
                    Bot::where(
                        "id",
                        "=",
                        $this->activeBot["id"],
                        "and",
                    )->update([
                        "status" => "closed",
                    ]);
                    User::where("id", "=", auth()->user()->id, "and")->update([
                        "demo_balance" => $newBalanceMinusFees,
                    ]);
                });
            }

            if ($accountType === "live") {
                $amount = $this->activeBot["amount"];
                $currentBalance = auth()->user()->live_balance;
                $profit = $this->activeBot["profit"];
                $newBalance = $currentBalance + $amount + $profit;
                $newBalanceMinusFees = $newBalance - $this->fee;

                DB::transaction(function () use ($newBalanceMinusFees) {
                    Bot::where(
                        "id",
                        "=",
                        $this->activeBot["id"],
                        "and",
                    )->update([
                        "status" => "closed",
                    ]);
                    User::where("id", "=", auth()->user()->id, "and")->update([
                        "live_balance" => $newBalanceMinusFees,
                    ]);
                });

                // Add referral trade profit only when the profit is greater than 0
                if (auth()->user()->referred_by && $profit > 0) {
                    $profitMinusFees = $profit - $this->fee;
                    $this->computeUpline(auth()->user()->referred_by);
                    $this->processReferralPayouts(
                        $profitMinusFees,
                        auth()->user()->referral_code,
                        auth()->user()->name,
                    );
                }
            }

            session()->flash("message", "Robot has stopped trading");

            $this->redirectRoute("dashboard.robot");
        } catch (\Exception $e) {
            $this->dispatch(
                "stop-robot-error",
                message: $e->getMessage(),
            )->self();
        }
    }

    public function render()
    {
        return view("livewire.dashboard.traderoom");
    }
}
