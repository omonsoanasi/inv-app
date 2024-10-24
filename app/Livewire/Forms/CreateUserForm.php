<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateUserForm extends Form
{
    public ?User $user;
    public $editMode = false;

    #[Rule('required')]
    public $name;
    #[Rule('required','unique:users,email')]
    public $email;
    #[Rule('required')]
    public $password;

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->editMode = true;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }
    public function createUser()
    {
        if ($this->editMode)
        {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
            $this->reset();
            session()->flash('message', 'User updated successfully.');
        } else {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
            $this->reset();
            session()->flash('message', 'User created successfully.');
        }
    }
}
