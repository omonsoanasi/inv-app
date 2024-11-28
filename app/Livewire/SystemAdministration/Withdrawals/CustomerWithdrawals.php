<?php

namespace App\Livewire\SystemAdministration\Withdrawals;

use App\Models\CustomerWithdrawal;
use Livewire\Component;

class CustomerWithdrawals extends Component
{
    public function render()
    {
        return view('livewire.system-administration.withdrawals.customer-withdrawals', [
            'customerWithdrawals' => CustomerWithdrawal::where('status',0)->latest()->get()
        ])->layout('layouts.admin');
    }
}
