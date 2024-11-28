<?php

namespace App\Livewire;

use App\Models\Activity;
use Livewire\Component;

class Activities extends Component
{
    public $activities;
    public function mount()
    {
        $this->activities = Activity::where('user_type',0)->get();
    }
    public function render()
    {
        return view('livewire.activities')->layout('layouts.app');
    }
}
