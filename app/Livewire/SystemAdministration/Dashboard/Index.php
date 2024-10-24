<?php

namespace App\Livewire\SystemAdministration\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.system-administration.dashboard.index')->layout('layouts.admin');
    }
}
