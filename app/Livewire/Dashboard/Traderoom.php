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

#[Layout('components.layouts.app')]

class Traderoom extends Component
{
    public $activeBot;

    public $timerCheckpoint;

    public $amount;

    public $fee;

    public string $accountType = '';

    public string $strategy = '';

    public string $minProfitLimit = '';

    public string $maxProfitLimit = '';

    public string $profit = '';

    public $previousBotProfit;

    public string $asset = '';

    public string $assetIcon = '';

    public string $assetClass = '';

    public string $sentiment = '';

    public int $botExpirationInHrs;

    public $firstUpline;

    public $secondUpline;

    public int $level = 0;

    public function mount()
    {
        if (session()->has('message')) {
            $message = session()->get('message');
            $this->dispatch('robot-created', message: $message)->self();
        }

        $this->activeBot = Bot::where(['user_id' => auth()->user()->id, 'status' => 'active'])->first();

        // RULE:: Do not remove from this position
        if (is_null($this->activeBot)) {
            $this->redirectRoute('dashboard.robot');
            return;
        }
        // RULE:: Do not remove from this position

        if ($this->activeBot && isset($this->activeBot['end'])) {
            $endString = $this->activeBot['end'];
            // If the timestamp is in milliseconds, convert to seconds
            if (is_numeric($endString) && strlen($endString) >= 13) {
                $endTimestamp = intval($endString) / 1000;
                $endTime = \Carbon\Carbon::createFromTimestamp($endTimestamp);
            } else {
                // Try to parse as Y-m-d H:i:s, fallback to strtotime
                try {
                    $endTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $endString);
                } catch (\Exception $e) {
                    $endTimestamp = strtotime($endString);
                    $endTime = $endTimestamp ? \Carbon\Carbon::createFromTimestamp($endTimestamp) : null;
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
            $this->botExpirationInHrs = isset($endTime) ? max(0, $now->diffInHours($endTime, false)) : 0;
        } else {
            $this->botExpirationInHrs = 0;
        }

        $previousBotTrade = Trade::where('user_id', auth()->user()->id)->where('bot_id', $this->activeBot['id'])->latest()->first();

        if ($previousBotTrade) {
            $this->previousBotProfit = number_format($previousBotTrade['profit'] / 100, 2, '.', ',');
        } else {
            $this->previousBotProfit = 0;
        }

        $this->amount = $this->normalizeAmount($this->activeBot['amount']);
        $this->accountType = $this->activeBot['account_type'] === 'demo' ? 'Demo account' : 'Live account';

        $strategy = Strategy::find($this->activeBot['strategy']);

        $this->strategy = $strategy['name'];
        $this->minProfitLimit = $strategy['min_roi'];
        $this->maxProfitLimit = $strategy['max_roi'];
        $this->profit = $this->normalizeAmount($this->activeBot['profit']);
        $this->fee = $this->calculateFees();
        $this->asset = $this->activeBot['asset'];
        $this->assetClass = $this->activeBot['asset_class'];
        $this->assetIcon = $this->activeBot['asset_image_url'];
        $this->sentiment = $this->activeBot['sentiment'];
        $this->timerCheckpoint = $this->activeBot['timer_checkpoint'];
    }

    public function calculateFees(): float
    {
        $profit = $this->normalizeAmount($this->activeBot['profit']);
        $fee = 0.1 * $profit;
        return $fee;
    }

    public function normalizeAmount(int $amount): int | float
    {
        return $amount / 100;
    }

    public function serializeAmount(float $amount): int
    {
        return $amount * 100;
    }

    public function refreshAssetData(): void
    {
        $activeBot = Bot::where(['user_id' => auth()->user()->id, 'status' => 'active'])->first();
        $previousBotTrade = Trade::where('user_id', auth()->user()->id)->where('bot_id', $this->activeBot['id'])->latest()->first();

        if ($previousBotTrade) {
            $this->previousBotProfit = number_format($previousBotTrade['profit'] / 100, 2, '.', ',');
        } else {
            $this->previousBotProfit = 0;
        }

        $this->profit = $this->normalizeAmount($activeBot['profit']);
        $this->fee = $this->calculateFees();
        $this->asset = $activeBot['asset'];
        $this->assetClass = $activeBot['asset_class'];
        $this->assetIcon = $activeBot['asset_image_url'];
        $this->sentiment = $activeBot['sentiment'];
        $data = [
            'asset' => $activeBot['asset'],
            'assetImageUrl' => $activeBot['asset_image_url'],
            'assetClass' => $activeBot['asset_class'],
            'isBotActive' => true
        ];
        $this->dispatch('asset-updated', data: $data)->to(AssetIndicator::class);
        $this->timerCheckpoint = $activeBot['timer_checkpoint'];
    }

    public function computeUpline(string $referredBy)
    {
        $currentUpline = User::where('referral_code', $referredBy)->first();
        if ($currentUpline !== null) {
            $this->firstUpline = $currentUpline;
            $this->level += 1;
            $currentUpline = User::where('referral_code', $currentUpline['referred_by'])->first();
            if ($currentUpline !== null) {
                $this->secondUpline = $this->firstUpline;
                $this->firstUpline = $currentUpline;
                $this->level += 1;
            }
        }
    }

    public function processReferralPayouts(float $robotProfit, string $referralCode, string $botOwnerName)
    {
        try {
            if ($this->level === 1) {
                /**
                 * Top upline commission(8% on trade profits)
                 */
                $commission = round(0.08 * floatval($robotProfit), 2);
                $newFirstUplineBalance = (($this->firstUpline['live_balance'] / 100) + $commission) * 100;

                DB::transaction(function () use ($newFirstUplineBalance, $referralCode, $commission) {
                    User::where('id', $this->firstUpline['id'])->update(['live_balance' => $newFirstUplineBalance]);
                    Referral::create([
                        'user_id' => $this->firstUpline['id'],
                        'referral_code' => $referralCode,
                        'amount' => $commission * 100,
                        'level' => '1'
                    ]);
                });

                $this->firstUpline->notify(new CommissionEarned($this->firstUpline['name'], $botOwnerName, strval($commission), 'trade profit'));
            }

            if ($this->level === 2) {
                /**
                 * Middle upline commission(8% on trade profits)
                 */
                $commission = round(0.08 * floatval($robotProfit), 2);
                $newSecondUplineBalance = (($this->secondUpline['live_balance'] / 100) + $commission) * 100;

                DB::transaction(function () use ($newSecondUplineBalance, $referralCode, $commission) {
                    User::where('id', $this->secondUpline['id'])->update(['live_balance' => $newSecondUplineBalance]);
                    Referral::create([
                        'user_id' => $this->secondUpline['id'],
                        'referral_code' => $referralCode,
                        'amount' => $commission * 100,
                        'level' => '1'
                    ]);
                });

                $this->secondUpline->notify(new CommissionEarned($this->secondUpline['name'], $botOwnerName, strval($commission), 'trade profit'));

                /**
                 * First upline commission(4% on trade profits)
                 */
                $commission = round(0.04 * floatval($robotProfit), 2);
                $newFirstUplineBalance = (($this->firstUpline['live_balance'] / 100) + $commission) * 100;

                DB::transaction(function () use ($newFirstUplineBalance, $referralCode, $commission) {
                    User::where('id', $this->firstUpline['id'])->update(['live_balance' => $newFirstUplineBalance]);
                    Referral::create([
                        'user_id' => $this->firstUpline['id'],
                        'referral_code' => $referralCode,
                        'amount' => $commission * 100,
                        'level' => '2'
                    ]);
                });

                $this->firstUpline->notify(new CommissionEarned($this->firstUpline['name'], $botOwnerName, strval($commission), 'trade profit'));
            }
        } catch (\Exception $e) {
            session()->flash('error-message', $e->getMessage());
        }
    }

    public function stopRobot(): void
    {
        try {
            $accountType = $this->activeBot['account_type'];

            if ($accountType === "demo") {
                $amount = $this->normalizeAmount($this->activeBot['amount']);
                $currentBalance = $this->normalizeAmount(auth()->user()->demo_balance);
                $profit = $this->normalizeAmount($this->activeBot['profit']);
                $newBalance = $currentBalance + $amount + $profit;
                $newBalanceMinusFees = $newBalance - $this->fee;
                $serialized = $this->serializeAmount($newBalanceMinusFees);

                DB::transaction(function () use ($serialized) {
                    Bot::where('id', $this->activeBot['id'])->update(['status' => 'closed']);
                    User::where('id', auth()->user()->id)->update(['demo_balance' => $serialized]);
                });
            }

            if ($accountType === "live") {
                $amount = $this->normalizeAmount($this->activeBot['amount']);
                $currentBalance = $this->normalizeAmount(auth()->user()->live_balance);
                $profit = $this->normalizeAmount($this->activeBot['profit']);
                $newBalance = $currentBalance + $amount + $profit;
                $newBalanceMinusFees = $newBalance - $this->fee;
                $serialized = $this->serializeAmount($newBalanceMinusFees);

                DB::transaction(function () use ($serialized) {
                    Bot::where('id', $this->activeBot['id'])->update(['status' => 'closed']);
                    User::where('id', auth()->user()->id)->update(['live_balance' => $serialized]);
                });

                if (auth()->user()->referred_by) {
                    $profitMinusFees = $profit - $this->fee;
                    $this->computeUpline(auth()->user()->referred_by);
                    $this->processReferralPayouts($profitMinusFees, auth()->user()->referral_code, auth()->user()->name);
                }
            }

            session()->flash('message', 'Robot has stopped trading');

            $this->redirectRoute('dashboard.robot');
        } catch (\Exception $e) {
            $this->dispatch('stop-robot-error', message: $e->getMessage())->self();
        }
    }

    public function render()
    {
        return view('livewire.dashboard.traderoom');
    }
}
