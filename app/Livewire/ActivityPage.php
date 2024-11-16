<?php

namespace App\Livewire;

use App\Models\AccountBalance;
use App\Models\Activity;
use App\Models\CompletedTask;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActivityPage extends Component
{
    public $id;
    public $activity;
    public $user_id;
    public $completedTask; // Property to hold the completed task
    public $accountBalance;

    public function mount($id)
    {
        $this->id = $id;
        $this->activity = Activity::find($id);
        $this->user_id = auth()->user()->id;

    }

    public function completeTask()
    {
        // Start a transaction
        DB::beginTransaction();

        try {
            // Create completed task
            $this->completedTask = CompletedTask::create([
                'activity_id' => $this->activity->id,
                'user_id' => $this->user_id,
            ]);

            //find if a similar activity has been completed to get the initial balance,
            $previousCompletedTasksBalance = AccountBalance::where('activity_id', $this->activity->id)
                ->where('user_id', $this->user_id)
                ->latest()
                ->first();

            $totalAmount = $previousCompletedTasksBalance ? $previousCompletedTasksBalance->total_amount : 0;
            // Get the created date or default to now, then add 24 hours
            $taskResetTime =  now()->addHours(24);
//dd($taskResetTime);
            // Create account balance entry
            $this->accountBalance = AccountBalance::create([
                'user_id' => $this->user_id,
                'activity_id' => $this->activity->id,
                'completed_task_id' => $this->completedTask->id,
                'initial_amount' => $this->activity->activity_commission,
                'total_amount' => $this->activity->activity_commission + $totalAmount,
                'task_reset_time' => $taskResetTime,
            ]);

            // Commit the transaction
            DB::commit();

            session()->flash('message', 'Task has been completed');
            return redirect()->route('activity-page', $this->activity->id);
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Log the error or handle it as needed
            session()->flash('error', 'An error occurred while completing the task: ' . $e->getMessage());
            return redirect()->route('activity-page', $this->activity->id);
        }
    }

    public function render()
    {
        return view('livewire.activity-page',[
            'completedTask' => $this->completedTask,
            'accountBalance' => AccountBalance::where('activity_id', $this->activity->id)->where('user_id', $this->user_id)->latest()->first(),
        ])->layout('layouts.app');
    }
}
