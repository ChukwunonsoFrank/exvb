<?php

namespace App\Livewire\Dashboard;

use App\Models\Referral;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]

class ShowReferrals extends Component
{
    // public $perPage = 10;

    // public $visibleCount;

    // public $totalReferrals;

    public $totalCommissions;

    public function mount()
    {
        // $this->totalReferrals = Referral::where('user_id', auth()->user()->id)->count();
        // $this->visibleCount = min($this->perPage, $this->totalReferrals);
        $this->totalCommissions = Referral::where('user_id', auth()->user()->id)->sum('amount');
        $this->totalCommissions = $this->totalCommissions / 100;
    }

    // public function loadMore(): void
    // {
    //     $this->visibleCount = min($this->visibleCount + $this->perPage, $this->totalReferrals);
    // }

    // public function getLevelPercentage(string $level)
    // {
    //     if ($level === '1') {
    //         return '5%';
    //     }

    //     if ($level === '2') {
    //         return '2%';
    //     }

    //     if ($level === '3') {
    //         return '1%';
    //     }
    // }

    public function render()
    {
        $level1Referrals = Referral::where(['user_id' => auth()->user()->id, 'level' => '1'])->latest()->get();
        $level2Referrals = Referral::where(['user_id' => auth()->user()->id, 'level' => '2'])->latest()->get();
        $level1Downlines = collect();
        $level2Downlines = collect();

        if ($level1Referrals) {
            foreach ($level1Referrals as $lv1Ref) {
                $users = User::where('referral_code', $lv1Ref->referral_code)->get();
                $level1Downlines = $level1Downlines->merge($users);
            }
        }

        if ($level2Referrals) {
            foreach ($level2Referrals as $lv2Ref) {
                $users = User::where('referral_code', $lv2Ref->referral_code)->get();
                $level2Downlines = $level2Downlines->merge($users);
            }
        }

        // $showLoadMoreButton = $this->visibleCount < $this->totalReferrals;

        return view('livewire.dashboard.show-referrals', [
            'level1Downlines' => $level1Downlines,
            'level2Downlines' => $level2Downlines,
            // 'showLoadMoreButton' => $showLoadMoreButton,
        ]);
    }
}
