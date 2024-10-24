<?php

namespace App\Livewire\SystemAdministration\Dashboard;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.system-administration.dashboard.admin-dashboard')->layout('layouts.admin');
    }
}
