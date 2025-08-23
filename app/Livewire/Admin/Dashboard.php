<?php

namespace App\Livewire\Admin;

use App\Models\Bot;
use App\Models\Deposit;
use App\Models\Strategy;
use App\Models\User;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin')]

class Dashboard extends Component
{
    public int $totalDepositSum = 0;

    public int $totalWithdrawalSum = 0;

    public $strategies;

    public function mount()
    {
        $this->totalDepositSum = Deposit::where('status', 'approved')->sum('amount');
        $this->totalWithdrawalSum = Withdrawal::where('status', 'approved')->sum('amount');
        $this->strategies = Strategy::all();
    }

    public function getStatusIndicatorColor(string $status)
    {
        if ($status === 'active') {
            return 'bg-success-50 text-success-600';
        }

        if ($status === 'stopped') {
            return 'bg-error-50 text-error-600';
        }

        if ($status === 'expired') {
            return 'bg-error-50 text-error-600';
        }
    }

    public function getStrategyName(int $strategyId)
    {
        $filtered = $this->strategies->filter(function (Strategy $value, $key) use ($strategyId) {
            return $value['id'] === intval($strategyId);
        });

        return $filtered->first()['name'];
    }

    public function convertTimestampToDateTime(string $timestamp): string
    {
        return Carbon::createFromTimestampMs($timestamp)->format('Y-m-d H:i:s');
    }

    
    public function normalizeAmount(int $amount): int | float
    {
        return $amount / 100;
    }

    public function serializeAmount(float $amount): int
    {
        return $amount * 100;
    }

    public function calculateFees(int $profit): float
    {
        $fee = 0.01 * $profit;
        return $fee;
    }

    public function stopRobot(int $botId)
    {
        try {
            $bot = Bot::find($botId);
            $userId = $bot->user->id;
            $accountType = $bot['account_type'];
            $amount = $this->normalizeAmount($bot['amount']);
            $profit = $this->normalizeAmount($bot['profit']);
            $fee = $this->calculateFees($profit);
            $netProfit = $profit - $fee;

            if ($accountType === "demo") {
                $currentBalance = $this->normalizeAmount($bot->user->demo_balance);
                $newBalance = $currentBalance + $amount + $netProfit;
                $serialized = $this->serializeAmount($newBalance);

                DB::transaction(function () use ($serialized, $botId, $userId) {
                    Bot::where('id', $botId)->update(['status' => 'stopped']);
                    User::where('id', $userId)->update(['demo_balance' => $serialized]);
                });
            }

            if ($accountType === "live") {
                $currentBalance = $this->normalizeAmount($bot->user->live_balance);
                $newBalance = $currentBalance + $amount + $netProfit;
                $serialized = $this->serializeAmount($newBalance);

                DB::transaction(function () use ($serialized, $botId, $userId) {
                    Bot::where('id', $botId)->update(['status' => 'stopped']);
                    User::where('id', $userId)->update(['live_balance' => $serialized]);
                });
            }
            session()->flash('success-message', 'Robot stopped successfully.');
        } catch (\Exception $e) {
            session()->flash('error-message', $e->getMessage());
        }
    }

    public function render()
    {
        $activeBots = Bot::with('user')->where('status', 'active')->paginate(10);
        return view('livewire.admin.dashboard', [
            'activeBots' => $activeBots
        ]);
    }
}
