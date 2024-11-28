<?php

namespace App\Livewire\SystemAdministration\Withdrawals;

use App\Models\AccountBalance;
use App\Models\CustomerWithdrawal;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CompleteWithdrawal extends Component
{
    public $id;
    public $customerWithdrawal;

    public $withdrawal_status;
    public $userBalance;

    public function mount($id)
    {
        $this->id = $id;
        $this->customerWithdrawal = CustomerWithdrawal::find($id);
        $this->userBalance = AccountBalance::where('user_id', auth()->user()->id)->latest()->first();
    }
    public function completeWithdrawal()
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            if ($this->withdrawal_status == '1') {
                // Update the withdrawal record to mark it as completed
                $this->customerWithdrawal->update([
                    'pending' => false,
                    'status' => true,
                ]);

                session()->flash('message', 'Withdrawal Completed');
            } else {
                // Update the withdrawal record to mark it as canceled
                $this->customerWithdrawal->update([
                    'pending' => false,
                    'status' => true, // Explicitly mark as not completed
                ]);

                // Refund the withdrawal amount to the user's balance
                $this->userBalance->update([
                    'total_amount' => $this->userBalance->total_amount + $this->customerWithdrawal->withdrawal_amount,
                ]);

                session()->flash('message', 'Withdrawal Cancelled');
            }

            // Commit the transaction if all operations succeed
            DB::commit();

            // Redirect to the withdrawal list
            return redirect()->route('customer-withdrawals');
        } catch (\Exception $e) {
            // Roll back the transaction in case of error
            DB::rollBack();

            // Log the exception for debugging
            \Log::error('Withdrawal process failed: ' . $e->getMessage());

            // Show an error message to the user
            session()->flash('error', 'An error occurred while processing the withdrawal. Please try again.');

            // Redirect to the withdrawal list
            return redirect()->route('customer-withdrawals');
        }
    }
    public function render()
    {
        return view('livewire.system-administration.withdrawals.complete-withdrawal')->layout('layouts.admin');
    }
}
