<?php

namespace App\Livewire\AccessControl;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AssignUserRole extends Component
{
    public $userId;
    public $user;
    public $roles;
    public $userRoles;
    public $selectedRoles = [];

    public function mount($userId)
    {
        $this->userId = $userId; // Set the user ID
        $this->user = User::findOrFail($userId); // Fetch the user by ID or fail if not found
        $this->roles = Role::all(); // Fetch all available roles
        $this->userRoles = $this->user->roles->pluck('name')->toArray(); // Fetch the user's roles' names
        $this->selectedRoles = $this->user->roles->pluck('id')->toArray(); // Fetch the user's roles' IDs
    }

    public function updateRoles()
    {
        $roles = Role::whereIn('id', $this->selectedRoles)->get();
        $this->user->syncRoles($roles);
        session()->flash('message', 'Roles successfully updated.');
//        $this->reset();
//        $this->mount($this->userId); // Re-mount to refresh data
        return redirect()->route('access-control'); // Redirect to a suitable route after updating roles

    }
    public function render()
    {
        return view('livewire.access-control.assign-user-role',[
            'user' => $this->user,
            'roles' => $this->roles,
            'selectedRoles' => $this->selectedRoles,
        ]);
    }
}
