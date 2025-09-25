<?php

namespace App\Livewire\Dashboard;

use App\Models\Kyc;
use Livewire\Component;

class AccountInformation extends Component
{
    public string $kycStatus = '';

    public bool $isKycPending = false;

    public function mount()
    {
        if (session()->has('message')) {
            $message = session()->get('message');
            $this->dispatch('message', message: $message)->self();
        }

        $this->kycStatus = auth()->user()->is_kyc_verified ? 'Verified' : 'Not verified';
        $kycRequest = Kyc::where('user_id', auth()->user()->id)->latest()->first();

        if ($kycRequest && $kycRequest['status'] === 'pending') {
            $this->isKycPending = true;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.account-information');
    }
}
