<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]

class Account extends Component
{
    public string $kycStatus = '';

    public function mount()
    {
        $user = User::where(['id' => auth()->user()->id])->latest()->first();
        $this->kycStatus = $user['is_kyc_verified'] ? 'Verified' : 'Unverified';
    }

    public function getStatusIndicatorColor(string $status)
    {
        if ($status === 'pending') {
            return 'bg-yellow-600';
        }

        if ($status === 'approved') {
            return 'bg-[#31865b]';
        }

        if ($status === 'declined') {
            return 'bg-[#e32d2d]';
        }
    }

    public function render()
    {
        return view('livewire.dashboard.account');
    }
}
