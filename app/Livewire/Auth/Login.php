<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth.layout')]

#[Title('Login')]

class Login extends Component
{
  #[Validate('required|string|email')]
  public string $email = '';

  #[Validate('required|string')]
  public string $password = '';

  public bool $remember = false;

  public $gRecaptchaResponse;

  /**
   * Handle an incoming authentication request.
   */
  public function login()
  {
    try {
      // if (is_null($this->gRecaptchaResponse)) {
      //   $this->dispatch('login-error', message: 'Please confirm you are not a robot.')->self();
      // }

      // $recatpchaResponse = Http::get("https://www.google.com/recaptcha/api/siteverify", [
      //   'secret' => config('services.recaptcha.secret'),
      //   'response' => $this->gRecaptchaResponse
      // ]);

      // $result = $recatpchaResponse->json();

      // if ($recatpchaResponse->successful() && $result['success'] == true) {
      $user = User::where('email', $this->email)->first();

      if ($user && $user['two_factor_enabled']) {
        $this->redirectRoute('login.verifylogintwofa', [
          'email' => $this->email,
          'password' => $this->password
        ]);
      } else {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
          RateLimiter::hit($this->throttleKey());

          throw ValidationException::withMessages([
            'email' => __('auth.failed'),
          ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        session()->flash('just_logged_in', true);

        $loggedInUser = User::find(Auth::id());

        $ipApiEndpoint = "http://ip-api.com/json/" . $this->getClientIPv4();

        $ipApiResponse = Http::get($ipApiEndpoint);

        $ipApiResult = $ipApiResponse->json();

        if ($ipApiResponse->successful() && $ipApiResult['status'] === 'success') {
          $loggedInUser->country = $ipApiResult['country'];
        } else {
          $loggedInUser->country = 'N/A';
        }

        $loggedInUser->last_login_at = now();
        $loggedInUser->ip_address = $this->getClientIPv4();
        $loggedInUser->save();

        if (Auth::user()->is_admin) {
          return redirect('/admin/dashboard');
        }

        $this->redirectIntended(default: route('dashboard.robot', absolute: false));
      }
      // } else {
      //   $this->dispatch('login-error', message: 'Please confirm you are not a robot.')->self();
      // }
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
    $forwarded = request()->header('X-Forwarded-For');
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


  /**
   * Ensure the authentication request is not rate limited.
   */
  protected function ensureIsNotRateLimited(): void
  {
    if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
      return;
    }

    event(new Lockout(request()));

    $seconds = RateLimiter::availableIn($this->throttleKey());

    throw ValidationException::withMessages([
      'email' => __('auth.throttle', [
        'seconds' => $seconds,
        'minutes' => ceil($seconds / 60),
      ]),
    ]);
  }

  /**
   * Get the authentication rate limiting throttle key.
   */
  protected function throttleKey(): string
  {
    return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
  }
}
