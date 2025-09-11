<?php

namespace App\Livewire\Dashboard\Partials;

use App\Models\Bot;
use Livewire\Component;

class Header extends Component
{
    public $accountType;

    public function mount()
    {
        $activeBot = Bot::where(['user_id' => auth()->user()->id, 'status' => 'active'])->first();
        
        if($activeBot) {
            $this->accountType = $activeBot['account_type'];
        } else {
            $this->accountType = null;
        }

    }

    public function render()
    {
        return view('livewire.dashboard.partials.header');
    }
}
