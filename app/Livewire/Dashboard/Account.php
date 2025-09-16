<?php

namespace App\Livewire\Dashboard;

use App\Models\Kyc;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]

class Account extends Component
{
    public string $kycStatus = '';

    public function mount()
    {
        $kycRequest = Kyc::where(['user_id' => auth()->user()->id])->latest()->first();

        if($kycRequest) {
            $this->kycStatus = $kycRequest['status'];
        }
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
