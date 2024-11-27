<?php

namespace App\Livewire;

use App\Models\CustomerWithdrawal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CustWithdraw extends Component
{
    public $withdrawalAmount;
    public $fee = 0; // Ensure this line is present
    public $actualAmount = 0;
    public $withdrawalAddress;
    public $password;

    public function withdrawal()
    {
        // Ensure the user is authenticated
        if (!auth()->check()) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Retrieve the authenticated user
        $user = auth()->user();

        // Verify the user's password
        if (!Hash::check($this->password, $user->password)) {
            session()->flash('error', 'Invalid password. Please try again.');
            return redirect()->route('cust-withdraw');
        }

        // Start a database transaction
        DB::transaction(function () use ($user) {
            // Retrieve the authenticated user's ID
            $userId = $user->id;

            // Validate withdrawal amount (example validation)
            if ($this->withdrawalAmount < 10) {
                throw new \Exception('Withdrawal amount must be at least 10.00'); // This will trigger a rollback
            }

            // Calculate fee (5% of withdrawal amount)
            $fee = $this->withdrawalAmount * 0.05;

            // Calculate actual amount to be received
            $actualAmountReceived = $this->withdrawalAmount - $fee;

            // Create a new CustomerWithdrawal record
            CustomerWithdrawal::create([
                'user_id' => $userId,
                'withdrawal_amount' => $this->withdrawalAmount,
                'withdrawal_address' => $this->withdrawalAddress,
                'withdrawal_fee' => $fee,
                'actual_withdrawal_received' => $actualAmountReceived,
                'actual_withdrawal_amount' => $this->withdrawalAmount,
            ]);
        });

        session()->flash('message', 'Withdrawal request submitted successfully');
        return redirect()->route('cust-withdraw');
    }
//    public function withdrawal()
//    {
//        // Ensure the user is authenticated
//        if (!auth()->check()) {
//            return response()->json(['error' => 'User not authenticated'], 401);
//        }
//
//        // Start a database transaction
//        DB::transaction(function () {
//            // Retrieve the authenticated user's ID
//            $userId = auth()->user()->id;
//
//            // Validate withdrawal amount (example validation)
//            if ($this->withdrawalAmount < 10) {
//                throw new \Exception('Withdrawal amount must be at least 10.00'); // This will trigger a rollback
//            }
//
//            // Calculate fee (5% of withdrawal amount)
//            $fee = $this->withdrawalAmount * 0.05;
//
//            // Calculate actual amount to be received
//            $actualAmountReceived = $this->withdrawalAmount - $fee;
//
//            // Create a new CustomerWithdrawal record
//            $customerWithdrawal = CustomerWithdrawal::create([
//                'user_id' => $userId,
//                'withdrawal_amount' => $this->withdrawalAmount,
//                'withdrawal_address' => $this->withdrawalAddress,
//                'withdrawal_fee' => $fee,
//                'actual_withdrawal_received' => $actualAmountReceived,
//                'actual_withdrawal_amount' => $this->withdrawalAmount,
//            ]);
//
//        });
//
//        session()->flash('message', 'Withdrawal request submitted successfully');
//        return redirect()->route('cust-withdraw');
//    }
    public function render()
    {
        return view('livewire.cust-withdraw')->layout('layouts.app');
    }
}
