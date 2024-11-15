<?php

namespace App\Livewire;

use App\Models\Activity;
use App\Models\CompletedTask;
use Livewire\Component;

class ActivityPage extends Component
{
    public $id;
    public $activity;
    public $user_id;

    public function mount($id)
    {
        $this->id = $id;
        $this->activity = Activity::find($id);
        $this->user_id = auth()->user()->id;

    }

    public function completeTask()
    {
        // Create completed task
        CompletedTask::create([
            'activity_id' => $this->activity->id,
            'user_id' => $this->user_id,
        ]);

        session()->flash('message', 'Task has been completed');
        return redirect()->route('activity-page', $this->activity->id);
    }

    public function render()
    {
        return view('livewire.activity-page')->layout('layouts.app');
    }
}
