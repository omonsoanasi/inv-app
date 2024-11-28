<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public ?string $referral_code = null; // Optional referral code

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'referral_code' => ['nullable', 'string'], // Validate optional referral code
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Generate a unique referral code for the new user
        $validated['referral_code'] = $this->generateReferralCode();

        // Check if a referral code was provided and is valid
        if (!empty($this->referral_code)) {
            $referrer = User::where('referral_code', strtoupper($this->referral_code))->first();

            // Validate the referral code
            if (!$referrer) {
                // Return an error if the referral code is invalid
                $this->addError('referral_code', 'The provided referral code is invalid.');
                return; // Stop further execution
            }

            // If valid, save the referrer's ID
            $validated['referred_by'] = $referrer->id;
        }

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Generate a unique referral code.
     *
     * @return string
     */
    private function generateReferralCode(): string
    {
        do {
            $code = strtoupper('X' . Str::random(5)); // Generates a code like X9823IV
        } while (User::where('referral_code', $code)->exists());

        return $code;
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-white dark:from-gray-900 dark:to-gray-800 p-6">
    <div class="max-w-md w-full space-y-8 bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-2xl">
        <!-- Header -->
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold text-gray-900 dark:text-white">
                Create an Account
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Join us by filling out the information below
            </p>
        </div>

        <form wire:submit="register" class="mt-8 space-y-6">
            <!-- Name -->
            <div class="relative">
                <x-input-label for="name" :value="__('Name')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                <x-text-input
                    wire:model="name"
                    id="name"
                    class="block w-full mt-1 py-2.5 pl-3 pr-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    type="text"
                    name="name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Enter your name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="relative">
                <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                <x-text-input
                    wire:model="email"
                    id="email"
                    class="block w-full mt-1 py-2.5 pl-3 pr-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    type="email"
                    name="email"
                    required
                    autocomplete="username"
                    placeholder="Enter your email"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="relative">
                <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                <x-text-input
                    wire:model="password"
                    id="password"
                    class="block w-full mt-1 py-2.5 pl-3 pr-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Create a password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                <x-text-input
                    wire:model="password_confirmation"
                    id="password_confirmation"
                    class="block w-full mt-1 py-2.5 pl-3 pr-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm your password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Referral Code (Optional) -->
            <div class="relative">
                <x-input-label for="referral_code" :value="'Referral Code (optional)'" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                <x-text-input
                    wire:model.defer="referral_code"
                id="referral_code"
                class="block w-full mt-1 py-2.5 pl-3 pr-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                type="text"
                name="referral_code"
                placeholder='Enter referral code (if any)'
                />
                <x-input-error :messages="$errors->get('referral_code')" class="mt-2" />
            </div>

            <!-- Register Button and Login Link -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm font-medium text-blue-600 hover:text-blue-500 dark:text-blue_400 dark:hover:text-blue_300" href="{{ route('login') }}" wire:navigate>
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="
                        flex justify-center py_3 px_4 w_full mt_4 border border_transparent rounded-lg shadow_sm text_sm font_medium text_white bg_blue_600 hover:bg_blue_700 focus:outline_none focus:ring_2 focus:ring_offset_2 focus:ring_blue_500
                        dark:bg_blue_500 dark:hover:bg_blue_600 dark:focus:ring_offset_gray_800">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
