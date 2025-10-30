<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Deposit;
use Livewire\Component;
use App\Models\Referral;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use App\Notifications\DepositApproved;
use App\Notifications\DepositDeclined;
use App\Notifications\CommissionEarned;

#[Layout("components.layouts.admin")]
class AdminDeposit extends Component
{
  public $firstUpline;

  public $secondUpline;

  public int $level = 0;

  public function getStatusIndicatorColor(string $status)
  {
    if ($status === "pending") {
      return "bg-warning-50 text-warning-600";
    }

    if ($status === "confirmed") {
      return "bg-success-50 text-success-600";
    }

    if ($status === "declined") {
      return "bg-error-50 text-error-600";
    }
  }

  public function computeUpline(string $referredBy)
  {
    try {
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
    } catch (\Exception $e) {
      session()->flash("error-message", $e->getMessage());
    }
  }

  public function processReferralPayouts(
    float $depositAmount,
    string $referralCode,
    string $depositOwnerName,
  ) {
    try {
      if ($this->level === 1) {
        // Lock and fetch the first upline user
        $firstUpline = User::where("id", "=", $this->firstUpline["id"], "and")
          ->lockForUpdate()
          ->first();

        if (!$firstUpline) {
          throw new \Exception("First upline user not found");
        }

        /**
         * Top upline commission
         */
        $commission = intval(round($depositAmount * (8 / 100)));
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
            $depositOwnerName,
            strval($commission / 100),
            "deposit",
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
         * Middle upline commission
         */
        $commission = intval(round($depositAmount * (8 / 100)));
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
            $depositOwnerName,
            strval($commission / 100),
            "deposit",
          ),
        );

        /**
         * First upline commission
         */
        $commission = intval(round($depositAmount * (4 / 100)));
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
            $depositOwnerName,
            strval($commission / 100),
            "deposit",
          ),
        );
      }
    } catch (\Exception $e) {
      session()->flash("error-message", $e->getMessage());
    }
  }

  public function approveDeposit(int $depositId, int $userId, int $amount)
  {
    try {
      DB::transaction(function () use ($depositId, $userId, $amount) {
        // Lock the deposit record first to prevent concurrent approvals
        $deposit = Deposit::where("id", "=", $depositId, "and")
          ->lockForUpdate()
          ->first();

        if (!$deposit) {
          throw new \Exception("Deposit not found");
        }

        // Check if already processed
        if ($deposit->status === "confirmed") {
          throw new \Exception("Deposit already confirmed");
        }

        // Lock the user record for balance update
        $user = User::where("id", "=", $userId, "and")
          ->lockForUpdate()
          ->first();

        if (!$user) {
          throw new \Exception("User not found");
        }

        $userLiveBalance = $user->live_balance;
        $newBalance = $userLiveBalance + $amount;

        // Update user balance
        $user->live_balance = $newBalance;
        $user->save();

        // Update deposit status
        $deposit->status = "confirmed";
        $deposit->save();

        // Send notification (inside transaction to ensure it only happens once)
        $user->notify(
          new DepositApproved($user->name, strval($amount / 100)),
        );

        // Process referral payouts if applicable
        if ($user->referred_by !== null) {
          $this->computeUpline($user->referred_by);
          $this->processReferralPayouts(
            $amount,
            $user->referral_code,
            $user->name,
          );
        }
      });

      session()->flash(
        "success-message",
        "Deposit confirmed successfully",
      );
    } catch (\Exception $e) {
      session()->flash("error-message", $e->getMessage());
    }
  }

  public function declineDeposit(int $depositId, int $userId, int $amount)
  {
    try {
      $user = User::where("id", "=", $userId, "and")->first();

      Deposit::where("id", "=", $depositId, "and")->update([
        "status" => "declined",
      ]);

      $user->notify(
        new DepositDeclined($user->name, strval($amount / 100)),
      );

      session()->flash(
        "success-message",
        "Deposit declined successfully",
      );
    } catch (\Exception $e) {
      session()->flash("error-message", $e->getMessage());
    }
  }

  public function render()
  {
    $deposits = Deposit::with("user")
      ->whereHas("user", function ($query) {
        $query->where("is_admin", 0);
      })
      ->latest()
      ->paginate(10);
    return view("livewire.admin.admin-deposit", [
      "deposits" => $deposits,
    ]);
  }
}
