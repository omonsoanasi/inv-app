<?php

namespace App\Livewire\SystemAdministration\Dashboard;

use App\Models\Chat;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.system-administration.dashboard.index',[
            'chats' => Chat::latest()->get(),
        ])->layout('layouts.admin');
    }
}
