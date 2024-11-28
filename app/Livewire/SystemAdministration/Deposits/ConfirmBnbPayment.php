<?php

namespace App\Livewire\SystemAdministration\Deposits;

use App\Models\AccountBalance;
use App\Models\BnbCompleteRecharge;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ConfirmBnbPayment extends Component
{
    public $id;
    public $bnbDeposit;
    public $confirmed_amount;

    public function mount($id)
    {
        $this->id = $id;
        $this->bnbDeposit = BnbCompleteRecharge::find($id);
    }

    public function confirmBnbPayment()
    {
        $depositerId = $this->bnbDeposit->user_id;

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Get the latest account balance details for the user
            $accountBalance = AccountBalance::where('user_id', $depositerId)->latest()->first();

            if ($accountBalance) {
                // Update the latest record balance
                $accountBalance->update([
                    'total_amount' => $accountBalance->total_amount + $this->confirmed_amount,
                    'confirmed_amount' => $this->confirmed_amount,
                    'deposit_type' => 'bnb',
                    'task_reset_time' => Carbon::now(),
                    'bnb_complete_recharge_id' => $this->bnbDeposit->id,
                ]);
            } else {
                // Create a new record if account balance does not exist
                AccountBalance::create([
                    'user_id' => $depositerId,
                    'initial_amount' => 0,
                    'task_reset_time' => Carbon::now(),
                    'total_amount' => $this->confirmed_amount,
                    'deposit_type' => 'bnb',
                    'confirmed_amount' => $this->confirmed_amount,
                    'bnb_complete_recharge_id' => $this->bnbDeposit->id,
                ]);
            }
            //update the user type
            $this->user->update([
                'user_type' => 1,
            ]);
            // Update deposits table
            $this->bnbDeposit->update([
                'confirmed' => true,
            ]);

            // Commit the transaction
            DB::commit();

            session()->flash('message', 'Account balance successfully updated.');
            return redirect()->route('deposit-index');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Log the error message for debugging
            Log::error('Error confirming Bep20 payment: '.$e->getMessage());

            session()->flash('error', 'There was an error updating the account balance. Please try again.');
            return redirect()->route('deposit-index');
        }
    }

    public function render()
    {
        return view('livewire.system-administration.deposits.confirm-bnb-payment')->layout('layouts.admin');
    }
}
