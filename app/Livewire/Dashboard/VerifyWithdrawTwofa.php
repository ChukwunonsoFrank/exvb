<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\TransactionOccured;
use App\Notifications\WithdrawalInitiated;
use Livewire\Attributes\Url;
use Livewire\Component;
use PragmaRX\Google2FA\Google2FA;

class VerifyWithdrawTwofa extends Component
{
  #[Url]
  public $amount;

  #[Url]
  public $amountToReceive;

  #[Url]
  public $method;

  #[Url]
  public $address;

  public $code;

  public function verify2fa()
  {
    try {
      $google2fa = new Google2FA();
      $valid = $google2fa->verifyKey(auth()->user()->google2fa_secret, $this->code);
      if ($valid) {
        Withdrawal::create([
          'user_id' => auth()->user()->id,
          'amount' => $this->amount,
          'received_amount' => $this->amountToReceive,
          'payment_method' => $this->method,
          'address' => $this->address,
          'status' => 'pending'
        ]);

        $user = User::find(auth()->user()->id);
        $user->notify(new WithdrawalInitiated(auth()->user()->name, strval($this->amount / 100)));

        $admin = User::where('is_admin', 1)->first();
        $admin->notify(new TransactionOccured('withdrawal', $user['name'], strval($this->amount / 100)));

        session()->flash('message', 'Withdrawal successful. You will receive an email when your withdrawal has been processed.');

        $this->redirectRoute('dashboard.transactions');
      } else {
        $this->reset('code');
        $this->dispatch('error', message: 'Invalid code')->self();
      }
    } catch (\Exception $e) {
      $this->dispatch('error', message: $e->getMessage())->self();
    }
  }

  public function render()
  {
    return view('livewire.dashboard.verify-withdraw-twofa');
  }
}
