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
use Livewire\Attributes\Locked;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.app")]
class Traderoom extends Component
{
  #[Locked]
  public $isProcessing = false;

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
    // Reset properties
    $this->firstUpline = null;
    $this->secondUpline = null;
    $this->level = 0;

    $currentUpline = User::where(
      "referral_code",
      "=",
      $referredBy,
      "and",
    )->first();
    if ($currentUpline !== null) {
      $this->firstUpline = $currentUpline;
      $this->level = 1;
      $currentUpline = User::where(
        "referral_code",
        "=",
        $currentUpline["referred_by"],
        "and",
      )->first();
      if ($currentUpline !== null) {
        $this->secondUpline = $this->firstUpline;
        $this->firstUpline = $currentUpline;
        $this->level = 2;
      }
    }
  }

  public function processReferralPayouts(
    float $robotProfit,
    string $referralCode,
    string $botOwnerName,
  ) {
    if ($this->level === 1) {
      // Lock and fetch the first upline user
      $firstUpline = User::where("id", "=", $this->firstUpline["id"], "and")
        ->lockForUpdate()
        ->first();

      if (!$firstUpline) {
        throw new \Exception("First upline user not found");
      }

      /**
       * Top upline commission(12% on trade profits)
       */
      $commission = intval(round($robotProfit * (12 / 100)));
      $newFirstUplineBalance = $firstUpline->live_balance + $commission;

      $firstUpline->live_balance = $newFirstUplineBalance;
      $firstUpline->save();

      Referral::create([
        "user_id" => $firstUpline->id,
        "referral_code" => $referralCode,
        "amount" => $commission,
        "level" => "1",
      ]);

      $firstUpline->notify(
        new CommissionEarned(
          $firstUpline->name,
          $botOwnerName,
          strval($this->normalizeAmount($commission)),
          "trade profit",
        ),
      );
    }

    if ($this->level === 2) {
      // Lock both upline users to prevent race conditions
      $secondUpline = User::where("id", "=", $this->secondUpline["id"], "and")
        ->lockForUpdate()
        ->first();

      if (!$secondUpline) {
        throw new \Exception("Second upline user not found");
      }

      $firstUpline = User::where("id", "=", $this->firstUpline["id"], "and")
        ->lockForUpdate()
        ->first();

      if (!$firstUpline) {
        throw new \Exception("First upline user not found");
      }

      /**
       * Middle upline commission(12% on trade profits)
       */
      $commission = intval(round($robotProfit * (12 / 100)));
      $newSecondUplineBalance = $secondUpline->live_balance + $commission;

      $secondUpline->live_balance = $newSecondUplineBalance;
      $secondUpline->save();

      Referral::create([
        "user_id" => $secondUpline->id,
        "referral_code" => $referralCode,
        "amount" => $commission,
        "level" => "1",
      ]);

      $secondUpline->notify(
        new CommissionEarned(
          $secondUpline->name,
          $botOwnerName,
          strval($this->normalizeAmount($commission)),
          "trade profit",
        ),
      );

      /**
       * First upline commission(8% on trade profits)
       */
      $commission = intval(round($robotProfit * (8 / 100)));
      $newFirstUplineBalance = $firstUpline->live_balance + $commission;

      $firstUpline->live_balance = $newFirstUplineBalance;
      $firstUpline->save();

      Referral::create([
        "user_id" => $firstUpline->id,
        "referral_code" => $referralCode,
        "amount" => $commission,
        "level" => "2",
      ]);

      $firstUpline->notify(
        new CommissionEarned(
          $firstUpline->name,
          $botOwnerName,
          strval($this->normalizeAmount($commission)),
          "trade profit",
        ),
      );
    }
  }

  public function stopRobot(): void
  {
    try {
      if ($this->isProcessing) {
        return;
      }

      $this->isProcessing = true;

      DB::transaction(function () {
        // Lock the bot row for update
        $bot = Bot::where("user_id", "=", auth()->user()->id, "and")
          ->where("status", "active")
          ->lockForUpdate()
          ->first();

        if (!$bot) {
          throw new \Exception("No active bot found!");
        }

        // Lock the user record for balance update
        $user = User::where("id", "=", auth()->user()->id, "and")
          ->lockForUpdate()
          ->first();

        if (!$user) {
          throw new \Exception("User not found!");
        }

        // Now proceed with the rest of the logic
        $accountType = $bot->account_type;
        $amount = $bot->amount;
        $profit = $bot->profit;

        // Update bot status
        $bot->status = "closed";
        $bot->save();

        // Update user balance
        if ($accountType === "demo") {
          $user->demo_balance += $amount + $profit - $this->fee;
          $user->save();
        } else {
          $user->live_balance += $amount + $profit - $this->fee;
          $user->save();

          if ($user->referred_by && $profit > 0) {
            $profitMinusFees = $profit - $this->fee;
            $this->computeUpline($user->referred_by);
            $this->processReferralPayouts(
              $profitMinusFees,
              $user->referral_code,
              $user->name,
            );
          }
        }
      });

      session()->flash("message", "Robot has stopped trading");
      $this->redirectRoute("dashboard.robot");
    } catch (\Exception $e) {
      $this->dispatch(
        "stop-robot-error",
        message: $e->getMessage(),
      )->self();
    } finally {
      $this->isProcessing = false;
    }
  }

  public function render()
  {
    return view("livewire.dashboard.traderoom");
  }
}
