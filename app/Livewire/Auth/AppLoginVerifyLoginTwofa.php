<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use PragmaRX\Google2FA\Google2FA;

#[Layout('components.layouts.auth.layout')]

#[Title('Login')]

class AppLoginVerifyLoginTwofa extends Component
{
  #[Url]
  #[Validate('required|string|email')]
  public $email;

  #[Url]
  #[Validate('required')]
  public $password;

  public bool $remember = false;

  public $code;

  public function verify2fa()
  {
    try {
      $google2fa = new Google2FA();
      $user = User::where('email', $this->email)->first();
      $valid = $google2fa->verifyKey($user['google2fa_secret'], $this->code);

      if ($valid) {
        $this->validate();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
          throw ValidationException::withMessages([
            'email' => __('auth.failed'),
          ]);
        }

        Session::regenerate();

        session()->flash('just_logged_in', true);

        session(['device' => 'app']);

        $loggedInUser = User::find(Auth::id());

        $ipApiEndpoint = "http://ip-api.com/json/" . request()->ip();

        $ipApiResponse = Http::get($ipApiEndpoint);

        $ipApiResult = $ipApiResponse->json();

        if ($ipApiResponse->successful() && $ipApiResult['status'] === 'success') {
          $loggedInUser->country = $ipApiResult['country'];
        } else {
          $loggedInUser->country = 'N/A';
        }

        $loggedInUser->last_login_at = now();
        $loggedInUser->ip_address = request()->ip();
        $loggedInUser->save();

        $this->redirectIntended(default: route('dashboard.robot', absolute: false));
      } else {
        $this->reset('code');
        $this->dispatch('login-error', message: 'Invalid code')->self();
      }
    } catch (\Exception $e) {
      $this->dispatch('login-error', message: $e->getMessage())->self();
    }
  }

  public function getClientIPv4()
  {
    $ip = request()->ip();

    // If it's already IPv4, return it
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
      return $ip;
    }

    // Try to get IPv4 from X-Forwarded-For header
    $forwarded = request()->ip();
    if ($forwarded) {
      $ips = explode(',', $forwarded);
      foreach ($ips as $forwardedIp) {
        $forwardedIp = trim($forwardedIp);
        if (filter_var($forwardedIp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
          return $forwardedIp;
        }
      }
    }

    // Fallback for localhost
    if ($ip === '::1') {
      return '127.0.0.1';
    }

    // Otherwise, return original IP
    return $ip;
  }

  public function render()
  {
    return view('livewire.auth.app-login-verify-login-twofa');
  }
}
