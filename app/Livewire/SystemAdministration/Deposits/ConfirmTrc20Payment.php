<?php

namespace App\Livewire\SystemAdministration\Deposits;

use App\Models\AccountBalance;
use App\Models\Trc20USDTCompleteRecharge;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use function Livewire\Volt\updated;

class ConfirmTrc20Payment extends Component
{
    public $id;
    public $trc20Deposit;
    public $confirmed_amount;
    public $user;

    public function mount($id)
    {
        $this->id = $id;
        $this->trc20Deposit = Trc20USDTCompleteRecharge::find($id);
        $this->user = $this->trc20Deposit->user;
    }

    public function confirmTrc20Payment()
    {
        $depositerId = $this->trc20Deposit->user_id;

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
                    'deposit_type' => 'trc20USDT',
                    'task_reset_time' => Carbon::now(),
                    'trc20_u_s_d_t_complete_recharge_id' => $this->trc20Deposit->id,
                ]);
            } else {
                // Create a new record if account balance does not exist
                AccountBalance::create([
                    'user_id' => $depositerId,
                    'initial_amount' => 0,
                    'task_reset_time' => Carbon::now(),
                    'total_amount' => $this->confirmed_amount,
                    'deposit_type' => 'trc20USDT',
                    'confirmed_amount' => $this->confirmed_amount,
                    'trc20_u_s_d_t_complete_recharge_id' => $this->trc20Deposit->id,
                ]);
            }
            //update the user type
            $this->user->update([
                'user_type' => 1,
            ]);
            // Update deposits table
            $this->trc20Deposit->update([
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
            Log::error('Error confirming TRC20 payment: '.$e->getMessage());

            session()->flash('error', 'There was an error updating the account balance. Please try again.');
            return redirect()->route('deposit-index');
        }
    }


    public function render()
    {
        return view('livewire.system-administration.deposits.confirm-trc20-payment')->layout('layouts.admin');
    }
}
