<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AccountProfile extends Component
{
    #[On('sendMessage')]
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Redirect to the login page
    }
    public function render()
    {
        return view('livewire.account-profile')->layout('layouts.app');
    }
}
