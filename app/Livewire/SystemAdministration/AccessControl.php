<?php

namespace App\Livewire\SystemAdministration;

use App\Livewire\Forms\CreateRoleForm;
use App\Livewire\Forms\CreateUserForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class AccessControl extends Component
{
    use WithPagination;

    public CreateRoleForm $form;
    public CreateUserForm $userForm;

    public function saveUser()
    {
        $this->userForm->createUser();
    }

    public function saveRole()
    {
        $this->form->saveRole();
        $this->dispatch('roleCreated');
    }

    #[On('editUser')]
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $this->userForm->setUser($user);
    }

    #[On('editRole')]
    public function editRole($id)
    {
        $role = Role::findOrFail($id);
        $this->form->setRole($role);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        session()->flash('deleted', 'User deleted successfully.');
    }

    public function deleteRole($id)
    {
        Role::destroy($id);
        session()->flash('deleted', 'Role deleted successfully.');
    }
    public function resetUserForm()
    {
        $this->userForm->reset();
    }
    public function resetForm()
    {
        $this->form->reset();
    }
//    #[On('roleCreated')]
    public function render()
    {
        return view('livewire.system-administration.access-control', [
            'roles' => Role::paginate(10),
            'users' => User::paginate(10),
        ])->layout('layouts.admin');
    }
}
