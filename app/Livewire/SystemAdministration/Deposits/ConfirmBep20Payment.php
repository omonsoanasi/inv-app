<?php

namespace App\Livewire\SystemAdministration\Deposits;

use App\Models\AccountBalance;
use App\Models\Bep20USDTCompleteRecharge;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ConfirmBep20Payment extends Component
{
    public $id;
    public $bep20Deposit;
    public $confirmed_amount;

    public function mount($id)
    {
        $this->id = $id;
        $this->bep20Deposit = Bep20USDTCompleteRecharge::find($id);
    }

    public function confirmBep20Payment()
    {
        $depositerId = $this->bep20Deposit->user_id;

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
                    'deposit_type' => 'bep20USDT',
                    'task_reset_time' => Carbon::now(),
                    'bep20_u_s_d_t_complete_recharge_id' => $this->bep20Deposit->id,
                ]);
            } else {
                // Create a new record if account balance does not exist
                AccountBalance::create([
                    'user_id' => $depositerId,
                    'activity_id' => 1,
                    'completed_task_id' => 1,
                    'initial_amount' => 0,
                    'task_reset_time' => Carbon::now(),
                    'total_amount' => $this->confirmed_amount,
                    'deposit_type' => 'bep20USDT',
                    'confirmed_amount' => $this->confirmed_amount,
                    'trc20_u_s_d_t_complete_recharge_id' => $this->bep20Deposit->id,
                ]);
            }

            // Update deposits table
            $this->bep20Deposit->update([
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
        return view('livewire.system-administration.deposits.confirm-bep20-payment')->layout('layouts.admin');
    }
}
