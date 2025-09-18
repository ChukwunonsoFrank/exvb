<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class IdentityVerification extends Component
{
    public string $kycStatus = '';

    public function mount()
    {
        $user = User::where(['id' => auth()->user()->id])->latest()->first();
        $this->kycStatus = $user['is_kyc_verified'] ? 'Verified' : 'Unverified';
    }

    public function render()
    {
        return view('livewire.dashboard.identity-verification');
    }
}
