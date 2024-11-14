<?php

namespace App\Livewire;

use Livewire\Component;

class Trc20Usdt extends Component
{
    public function render()
    {
        return view('livewire.trc20-usdt',[
            'trc20USDT' => \App\Models\Trc20USDT::first(),
        ])->layout('layouts.app');
    }
}
