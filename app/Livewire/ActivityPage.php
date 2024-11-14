<?php

namespace App\Livewire;

use Livewire\Component;

class ActivityPage extends Component
{
    public function render()
    {
        return view('livewire.activity-page')->layout('layouts.app');
    }
}
