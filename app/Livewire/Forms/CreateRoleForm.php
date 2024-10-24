<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class CreateRoleForm extends Form
{
    public ?Role $role;
    public $editMode = false;

    #[Rule('required')]
    public $name;

    public function setRole(Role $role)
    {
        $this->role = $role;
        $this->editMode = true;
        $this->name = $role->name;
    }
    public function saveRole()
    {
        if ($this->editMode) {
            $this->validate();
            $this->role->update(['name' => $this->name]);
            $this->reset();
            session()->flash('message', $this->name . ' role has been updated.');
        } else {
            $this->validate();
            $role = Role::create(['name' => $this->name]);
            $this->reset();
            session()->flash('message', $this->name . ' role has been created.');
        }
    }
}
