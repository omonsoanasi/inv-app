<?php

namespace App\Livewire;

use Livewire\Component;

class Bnb extends Component
{
    public function render()
    {
        return view('livewire.bnb')->layout('layouts.app');
    }
}
