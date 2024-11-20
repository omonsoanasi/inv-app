<?php

namespace App\Livewire;

use App\Models\BnbCompleteRecharge;
use Livewire\Component;

class Bnb extends Component
{
    public $amount;

    public function completeBnbRecharge()
    {
        $bnbCompleteRecharge = BnbCompleteRecharge::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
        ]);
        session()->flash('message', 'Check your account within 3 minutes. If there are any challenges please contact customer service');
    }
    public function render()
    {
        return view('livewire.bnb')->layout('layouts.app');
    }
}
