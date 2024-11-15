<?php

namespace App\Livewire;

use App\Models\Activity;
use Livewire\Component;

class ActivityPage extends Component
{
    public $id;
    public $activity;

    public function mount($id)
    {
        $this->id = $id;
        $this->activity = Activity::find($id);
    }
    public function completeTask()
    {
        dd($this->activity);
    }
    public function render()
    {
        return view('livewire.activity-page')->layout('layouts.app');
    }
}
