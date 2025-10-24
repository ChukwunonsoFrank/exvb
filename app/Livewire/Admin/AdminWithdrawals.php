<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalApproved;
use App\Notifications\WithdrawalDeclined;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.admin")]
class AdminWithdrawals extends Component
{
    public function getStatusIndicatorColor(string $status)
    {
        if ($status === "pending") {
            return "bg-warning-50 text-warning-600";
        }

        if ($status === "completed") {
            return "bg-success-50 text-success-600";
        }

        if ($status === "declined") {
            return "bg-error-50 text-error-600";
        }
    }

    public function approveWithdrawal(
        int $withdrawalId,
        int $userId,
        int $amount,
    ) {
        try {
            $user = User::where("id", "=", $userId, "and")->first();

            Withdrawal::where("id", "=", $withdrawalId, "and")->update([
                "status" => "completed",
            ]);

            $user->notify(
                new WithdrawalApproved($user->name, strval($amount / 100)),
            );

            session()->flash(
                "success-message",
                "Withdrawal completed successfully",
            );
        } catch (\Exception $e) {
            session()->flash("error-message", $e->getMessage());
        }
    }

    public function declineWithdrawal(
        int $withdrawalId,
        int $userId,
        int $amount,
    ) {
        try {
            $user = User::where("id", "=", $userId, "and")->first();

            $userLiveBalance = $user["live_balance"];
            $newBalance = $userLiveBalance + $amount;

            DB::transaction(function () use (
                $withdrawalId,
                $userId,
                $newBalance,
            ) {
                Withdrawal::where("id", "=", $withdrawalId, "and")->update([
                    "status" => "declined",
                ]);

                User::where("id", "=", $userId, "and")->update([
                    "live_balance" => $newBalance,
                ]);
            });


            $user->notify(
                new WithdrawalDeclined($user->name, strval($amount / 100)),
            );

            session()->flash(
                "success-message",
                "Withdrawal declined successfully",
            );
        } catch (\Exception $e) {
            session()->flash("error-message", $e->getMessage());
        }
    }

    public function render()
    {
        $withdrawals = Withdrawal::with("user")
            ->whereHas("user", function ($query) {
                $query->where("is_admin", 0);
            })
            ->latest()
            ->paginate(10);
        return view("livewire.admin.admin-withdrawals", [
            "withdrawals" => $withdrawals,
        ]);
    }
}
