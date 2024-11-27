<?php

namespace App\Livewire\SystemAdministration\Deposits;

use App\Models\AccountBalance;
use App\Models\Bep20USDTCompleteRecharge;
use App\Models\BnbCompleteRecharge;
use App\Models\Trc20USDTCompleteRecharge;
use Livewire\Component;

class DepositIndex extends Component
{
    public $userInputAmount;

    public function confirmUserAccount($userId, $amount, $userInputAmount)
    {
        // Debug values
        dd([
            'userId' => $userId,
            'amount' => $amount,
            'userInputAmount' => $userInputAmount,
        ]);

    }

    public function render()
    {
        return view('livewire.system-administration.deposits.deposit-index', [
            'trc20UsdtDeposits' => Trc20USDTCompleteRecharge::latest()->paginate(5),
            'bep20UsdtDeposits' => Bep20USDTCompleteRecharge::latest()->paginate(5),
            'bnbDeposits'=> BnbCompleteRecharge::latest()->paginate(5),
        ])->layout('layouts.admin');
    }
}
