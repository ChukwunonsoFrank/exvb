<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
  /**
   * Log the current user out of the application.
   */
  public function __invoke()
  {
    Auth::guard('web')->logout();

    $loggedInFromApp = session('device');

    Session::invalidate();
    Session::regenerateToken();

    if ($loggedInFromApp === 'app') {
      return redirect('/applogin');
    }

    return redirect('/login');
  }
}
