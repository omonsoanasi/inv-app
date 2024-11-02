<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-white dark:from-gray-900 dark:to-gray-800 px-6">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8">

        <!-- Welcome and Verification Message -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Verify Your Email') }}
            </h2>
            <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Thanks for signing up! Please verify your email by clicking on the link we just sent. Didn\'t receive it? We’ll be happy to send another.') }}
            </p>
        </div>

        <!-- Verification Link Sent Notification -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm font-semibold text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900 p-3 rounded-lg">
                {{ __('A new verification link has been sent to your email address.') }}
            </div>
        @endif

        <!-- Resend and Logout Actions -->
        <div class="flex items-center justify-between mt-8">
            <x-primary-button wire:click="sendVerification" class="w-full sm:w-auto px-6 py-2">
                {{ __('Resend Verification Email') }}
            </x-primary-button>

            <button wire:click="logout" type="submit" class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 mt-4 sm:mt-0 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </div>
    </div>
</div>

