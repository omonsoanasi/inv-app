<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-white dark:from-gray-900 dark:to-gray-800 px-6">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8">

        <!-- Password Reset Message -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Reset Your Password') }}
            </h2>
            <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Forgot your password? No problem. Enter your email address below, and we will email you a link to reset your password.') }}
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-sm text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900 p-3 rounded-lg" :status="session('status')" />

        <!-- Password Reset Form -->
        <form wire:submit="sendPasswordResetLink" class="space-y-6">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                <x-text-input
                    wire:model="email"
                    id="email"
                    class="block w-full mt-1 px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    type="email"
                    name="email"
                    required
                    autofocus
                    placeholder="Enter your email"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="w-full sm:w-auto px-6 py-3">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

