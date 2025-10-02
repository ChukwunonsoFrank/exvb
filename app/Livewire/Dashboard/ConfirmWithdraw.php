<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\OtpToken;
use App\Models\User;
use App\Notifications\TokenRequested;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]

class ConfirmWithdraw extends Component
{
  #[Url]
  public $amount;

  #[Url]
  public $method;

  #[Url]
  public $address;

  #[Url]
  public $iconUrl;

  #[Url]
  public $slug;

  public $amountToPay;

  public function mount()
  {
    $this->amountToPay = $this->amount / 100;
  }

  public function formatAmountToPay()
  {
    return '$' . strval($this->amountToPay) . ' USD';
  }

  public function generateOTP()
  {
    try {
      // Pass query parameters by appending them to the URL string:
      $twoFAQueryParams = http_build_query([
        'amount' => $this->amount,
        'method' => $this->method,
        'address' => $this->address,
      ]);

      $otpQueryParams = http_build_query([
        'amount' => $this->amount,
        'method' => $this->method,
        'address' => $this->address,
        'iconUrl' => $this->iconUrl,
        'slug' => $this->slug,
      ]);

      if (auth()->user()->two_factor_enabled) {
        $this->redirect('/dashboard/withdraw/verifywithdrawtwofa?' . $twoFAQueryParams);
      } else {
        $token = OtpToken::updateOrCreate(
          [
            'user_id' => auth()->user()->id
          ],
          [
            'token' => substr(str_shuffle('0123456789'), 0, 6),
            'expires_at' => now()->addMinutes(10)->getTimestampMs()
          ]
        );

        $user = User::find(auth()->user()->id);

        $user->notify(new TokenRequested(auth()->user()->name, $token['token']));

        $this->redirect('/dashboard/withdraw/verifyotp?' . $otpQueryParams);
      }
    } catch (\Exception $e) {
      $this->dispatch('withdraw-error', message: $e->getMessage())->self();
    }
  }

  public function render()
  {
    return view('livewire.dashboard.confirm-withdraw');
  }
}
