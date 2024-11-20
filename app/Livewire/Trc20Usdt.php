<?php

namespace App\Livewire;

use App\Models\Trc20USDTCompleteRecharge;
use Livewire\Component;

class Trc20Usdt extends Component
{
    public $amount;

    public function completeTrc20Recharge()
    {
        $trc20UsdtCompleteRecharge = Trc20USDTCompleteRecharge::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
        ]);
        session()->flash('message', 'Check your account within 3 minutes. If there are any challenges please contact customer service');
    }
    public function render()
    {
        return view('livewire.trc20-usdt',[
            'trc20USDT' => \App\Models\Trc20USDT::first(),
        ])->layout('layouts.app');
    }
}
