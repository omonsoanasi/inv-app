<?php

namespace App\Livewire;

use App\Models\Bep20USDTCompleteRecharge;
use Livewire\Component;

class Bep20Usdt extends Component
{
    public $amount;

    public function completeBep20Recharge()
    {
        $Bep20UsdtCompleteRecharge = Bep20USDTCompleteRecharge::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
        ]);
        session()->flash('message', 'Check your account within 3 minutes. If there are any challenges please contact customer service');
    }
    public function render()
    {
        return view('livewire.bep20-usdt')->layout('layouts.app');
    }
}
