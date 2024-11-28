<?php

namespace App\Livewire;

use App\Models\Activity;
use Livewire\Component;

class ProActivities extends Component
{
    public $proActivities;
    public function mount()
    {
        $this->proActivities = Activity::where('user_type',1)->get();
    }
    public function render()
    {
        return view('livewire.pro-activities')->layout('layouts.app');
    }
}
