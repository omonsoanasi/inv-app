<?php

namespace App\Livewire\SystemAdministration\Dashboard;

use App\Models\PasswordResetCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class ResetPassword extends Component
{
    public function sendPasswordResetCode(): void
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $email = $this->email;

        // Check if the user exists
        $user = \App\Models\User::where('email', $email)->first();
        if (!$user) {
            $this->addError('email', __('No account found with this email.'));
            return;
        }

        // Generate a unique 6-digit code
        $code = Str::upper(Str::random(6));

        // Save the code to the database
        PasswordResetCode::updateOrCreate(
            ['email' => $email],
            ['code' => $code, 'expires_at' => now()->addMinutes(15)]
        );

        // Send the code via email
        Mail::send('emails.password_reset_code', ['code' => $code], function ($message) use ($email) {
            $message->to($email)->subject('Your Password Reset Code');
        });

        session()->flash('status', __('A password reset code has been sent to your email.'));
        $this->reset('email');
    }
    public function render()
    {
        return view('livewire.system-administration.dashboard.reset-password');
    }
}
