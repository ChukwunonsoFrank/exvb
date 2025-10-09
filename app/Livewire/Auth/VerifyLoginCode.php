<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use App\Models\User;
use App\Notifications\LoginCodeRequested;
use Livewire\Component;
use Illuminate\Auth\Events\Registered;
use App\Notifications\ReferralLinkApplied;
use App\Notifications\UserRegistered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

#[Layout('components.layouts.auth.layout')]

#[Title('Register')]

class VerifyLoginCode extends Component
{
  #[Url]
  public $name;

  #[Url]
  public $email;

  #[Url]
  public $password;

  #[Url]
  public $hash;

  #[Url]
  public $ref;

  public $code = '';

  public function verifyLoginCode()
  {
    try {
      if ($this->code === '') {
        $this->dispatch('signup-error', message: 'Login code field is empty.')->self();
        return;
      }

      $valid = Hash::check($this->code, $this->hash);

      if (! $valid) {
        $this->dispatch('signup-error', message: 'Invalid login code.')->self();
        return;
      }

      $country = '';

      $ipApiEndpoint = "http://ip-api.com/json/" . request()->ip();

      $ipApiResponse = Http::get($ipApiEndpoint);

      $ipApiResult = $ipApiResponse->json();

      if ($ipApiResponse->successful() && $ipApiResult['status'] === 'success') {
        $country = $ipApiResult['country'];
      } else {
        $country = 'N/A';
      }

      event(new Registered(($user = User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
        'unhashed_password' => $this->password,
        'live_balance' => 0,
        'demo_balance' => 1000000,
        'account_status' => 'active',
        'referral_code' => $this->generateReferralCode(),
        'referred_by' => $this->ref ?? null,
        'uid' => $this->generateUid(),
        'last_login_at' => now(),
        'ip_address' => request()->ip(),
        'country' => $country
      ]))));

      /**
       * Send notifications to respective correspondents.
       */
      Notification::route('mail', 'fredhonest230@gmail.com')->notify(new UserRegistered($this->email));

      $referralCodeOwner = User::where('referral_code', $this->ref)->first();

      if ($referralCodeOwner) {
        $referralCodeOwner->notify(new ReferralLinkApplied($referralCodeOwner->name, $user->name));
      }

      Auth::login($user);

      session()->flash('just_registered', true);

      $this->redirect(route('dashboard.robot', absolute: false), navigate: false);
    } catch (\Exception $e) {
      $this->dispatch('signup-error', message: $e->getMessage())->self();
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

  public function generateReferralCode(): string
  {
    $length = 9;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return strtoupper($randomString);
  }

  public function generateUid(): string
  {
    do {
      $uid = str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
    } while (User::where('uid', $uid)->exists());

    return $uid;
  }

  public function resendCode()
  {
    try {
      $loginCode = substr(str_shuffle('0123456789'), 0, 6);

      $this->hash = Hash::make($loginCode);

      Notification::route('mail', $this->email)->notify(new LoginCodeRequested($loginCode));

      $message = 'A new code has been sent to your email address';

      $this->dispatch('code-resent', message: $message)->self();
    } catch (\Exception $e) {
      $this->dispatch('signup-error', message: $e->getMessage())->self();
    }
  }

  public function render()
  {
    return view('livewire.auth.verify-login-code');
  }
}
