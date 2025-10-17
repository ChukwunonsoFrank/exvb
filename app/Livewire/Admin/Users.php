<?php

namespace App\Livewire\Admin;

use App\Models\Bot;
use App\Models\Deposit;
use App\Models\Kyc;
use App\Models\OtpToken;
use App\Models\Trade;
use App\Models\User;
use App\Models\Withdrawal;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin')]

class Users extends Component
{
  public string $query = '';

  public function getStatusIndicatorColor(string $status)
  {
    if ($status === 'active') {
      return 'bg-success-50 text-success-600';
    }

    if ($status === 'inactive') {
      return 'bg-error-50 text-error-600';
    }
  }

  public function deactivateUser(int $userId)
  {
    try {
      User::where('id', $userId)->update([
        'account_status' => 'inactive'
      ]);
      session()->flash('success-message', 'Deactivation successful.');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
    }
  }

  public function destroyUser(int $userId)
  {
    try {
      // Delete related KYC records
      Kyc::where('user_id', $userId)->delete();

      // Delete related deposit records
      Deposit::where('user_id', $userId)->delete();

      // Delete related withdrawal records
      Withdrawal::where('user_id', $userId)->delete();

      // Delete related bot records
      Bot::where('user_id', $userId)->delete();

      // Delete related bot trades records
      Trade::where('user_id', $userId)->delete();

      // Delete related bot trades records
      OtpToken::where('user_id', $userId)->delete();

      // Delete the user account
      $user = User::findOrFail($userId);
      $user->delete();
      session()->flash('success-message', 'User deleted successfully.');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
    }
  }

  public function activateUser(int $userId)
  {
    try {
      User::where('id', $userId)->update([
        'account_status' => 'active'
      ]);
      session()->flash('success-message', 'Activation successful.');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
    }
  }

  public function search() {}

  public function render()
  {
    $query = User::from('users as u')
      ->leftJoin('users as referrers', 'u.referred_by', '=', 'referrers.referral_code')
      ->select('u.*', 'referrers.name as referrer_name')
      ->where('u.is_admin', 0);

    if (!empty($this->query)) {
      $query = $query->whereRaw("MATCH(u.name, u.email) AGAINST(? IN BOOLEAN MODE)", [$this->query]);
    }

    $users = $query->latest()->paginate(20);

    return view('livewire.admin.users', [
      'users' => $users
    ]);
  }
}
