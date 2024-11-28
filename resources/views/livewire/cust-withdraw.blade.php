@php
    $accountBalance = \App\Models\AccountBalance::where('user_id', auth()->user()->id)->latest()->first();
    $pendingWithdrawal = \App\Models\CustomerWithdrawal::where('user_id', auth()->user()->id)->where('pending',true)->latest()->first();
@endphp
<div class="m-4">
    @if(session('message'))
        <div x-data="{ open: true }" x-show="open"
             class="fixed top-4 right-4 z-50 flex bg-green-100 max-w-sm rounded-lg shadow-md p-4">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center w-full">
                    <div class="w-16 bg-green-500 p-4 rounded-l-lg">
                        <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 512 512">
                            <path
                                d="M468.907 214.604c-11.423 0-20.682 9.26-20.682 20.682v20.831c-.031 54.338-21.221 105.412-59.666 143.812-38.417 38.372-89.467 59.5-143.761 59.5h-.12C132.506 459.365 41.3 368.056 41.364 255.883c.031-54.337 21.221-105.411 59.667-143.813 38.417-38.372 89.468-59.5 143.761-59.5h.12c28.672.016 56.49 5.942 82.68 17.611 10.436 4.65 22.659-.041 27.309-10.474 4.648-10.433-.04-22.659-10.474-27.309-31.516-14.043-64.989-21.173-99.492-21.192h-.144c-65.329 0-126.767 25.428-172.993 71.6C25.536 129.014.038 190.473 0 255.861c-.037 65.386 25.389 126.874 71.599 173.136 46.21 46.262 107.668 71.76 173.055 71.798h.144c65.329 0 126.767-25.427 172.993-71.6 46.262-46.209 71.76-107.668 71.798-173.066v-20.842c0-11.423-9.259-20.683-20.682-20.683z"/>
                            <path
                                d="M505.942 39.803c-8.077-8.076-21.172-8.076-29.249 0L244.794 271.701l-52.609-52.609c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.077-8.077 21.172 0 29.249l67.234 67.234a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058L505.942 69.052c8.077-8.077 8.077-21.172 0-29.249z"/>
                        </svg>
                    </div>
                    <div class="w-auto text-gray-800 items-center p-4">
                        <span class="text-lg font-bold pb-4">Success!</span>
                        <p class="leading-tight">{{ session('message') }}</p>
                    </div>
                </div>
                <button @click="open = false" class="text-gray-500 hover:text-gray-700 p-2">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M6.293 6.293a1 1 0 0 1 1.414 0L12 9.586l4.293-4.293a1 1 0 0 1 1.414 1.414L13.414 12l4.293 4.293a1 1 0 0 1-1.414 1.414L12 13.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L10.586 12 6.293 7.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif
        @if(session('error'))
            <div x-data="{ open: true }" x-show="open" class="fixed top-4 right-4 z-50 flex bg-green-100 max-w-sm rounded-lg shadow-md p-4">
                <div class="flex-shrink-0 w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                    <svg class="h-6 w-6 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z"/>
                        <path d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z"/>
                        <path d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z"/>
                    </svg>
                </div>
                <div class="ml-3 text-gray-800 dark:text-gray-200">
                    <span class="font-semibold">Heads Up!</span>
                    <p>{{ session('error') }}</p>
                </div>
                <button @click="open = false" class="ml-auto text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M6.293 6.293a1 1 0 0 1 1.414 0L12 9.586l4.293-4.293a1 1 0 0 1 1.414 1.414L13.414 12l4.293 4.293a1 1 0 0 1-1.414 1.414L12 13.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L10.586 12 6.293 7.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                </button>
            </div>
        @endif
    <div class="credit-card w-full sm:w-auto shadow-lg mx-auto rounded-xl bg-white" x-data="creditCard">
        <header class="flex flex-col justify-center items-center p-4 space-y-4">
            <!-- Notification -->
            <div
                class="w-full bg-yellow-200 text-yellow-800 p-3 rounded-lg shadow-md text-center text-sm font-medium"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
            >
                🚨 The minimum withdrawal amount is <strong>$10.00</strong>. Please ensure your balance meets this requirement.
                <button
                    class="ml-2 text-yellow-800 font-bold underline hover:text-yellow-600"
                    @click="show = false"
                >
                    Dismiss
                </button>
            </div>

            <!-- Front Side -->
            <div class="relative w-full h-64 bg-gradient-to-r from-green-300 to-green-600 rounded-xl shadow-lg p-6 text-white" >
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <p class="text-xl font-bold tracking-wide">WITHDRAWAL ACCOUNT</p>
                    <p class="text-sm text-red-300 font-medium">24 hours withdrawal</p>
                </div>

                <!-- Balance -->
                <div class="mt-6 text-3xl font-bold tracking-wide">
                    $ {{ number_format(optional($accountBalance)->total_amount ?? 0, 2) }}
                </div>

                <!-- Details -->
                <div class="flex justify-between items-center mt-8">
                    <div>
                        <p class="text-xs font-light uppercase">Currency</p>
                        <div class="text-lg font-semibold">USDT</div>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-light uppercase">Withdrawal Method</p>
                        <p class="text-lg font-semibold">TRC20-USDT</p>
                    </div>
                </div>
            </div>

            <!-- Back Side -->
            <div
                class="relative w-full h-64 bg-gray-900 rounded-xl shadow-lg p-6 text-white"
                x-show="card === 'back'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
            >
                <!-- Top Placeholder -->
                <div class="bg-gray-700 h-10 w-full rounded-md"></div>

                <!-- Security Code -->
                <div class="flex justify-end mt-8">
                    <p class="bg-gray-200 text-gray-900 py-2 px-4 rounded-lg text-lg font-medium">
                        <span x-text="securityCode !== '' ? securityCode : 'XXX'"></span>
                    </p>
                </div>
            </div>
        </header>

        <main class="mt-4 p-4">
            @if($pendingWithdrawal)
                <h6 class="text-xl font-semibold text-red-700 text-center">Pending withdrawal request of USDT {{ number_format($pendingWithdrawal->withdrawal_amount,2) }}</h6>
            @endif
            <h1 class="text-xl font-semibold text-gray-700 text-center">Details</h1>
            <form id="withdrawalForm" wire:submit="withdrawal">
                <div>
                    <div class="my-3">
                        <label for="" class="text-gray-700">Withdrawal Amount (Minimum 10.00)</label>
                        <input
                            id="withdrawalAmount"
                            wire:model="withdrawalAmount"
                            type="text"
                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                            placeholder="Amount 10.00 - 1000000.00"
                            oninput="validateWithdrawalAmount()"
                        />
                        <span id="amountError" class="text-red-500 text-sm hidden">Amount must be greater than 10.</span>
                    </div>
                    <div class="my-3">
                        <label for="" class="text-gray-700">Withdrawal Address</label>
                        <input
                            wire:model="withdrawalAddress"
                            type="text"
                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                            placeholder="Withdrawal Address"
                        />
                    </div>
                    <div class="my-3">
                        <label for="" class="text-gray-700">Password</label>
                        <input
                            wire:model="password"
                            type="password"
                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                            placeholder="password"
                        />
                    </div>
                    <div class="my-3">
                        <label for="" class="text-gray-700">Fee (5%)</label>
                        <input
                            wire:model="fee"
                            type="text"
                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                            placeholder=""
                            disabled
                        />
                    </div>
                    <div class="my-3">
                        <label for="" class="text-gray-700">Actual Amount to be Received</label>
                        <input
                            wire:model="actualAmount"
                            type="text"
                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                            placeholder=""
                            disabled
                        />
                    </div>
                </div>
                <footer class="mt-6 p-4">
                    <button type="submit" id="confirmButton"
                            class="submit-button px-4 py-3 rounded-full bg-green-300 text-green-900 focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                        Confirm
                    </button>
                </footer>
            </form>
        </main>
    </div>
</div>
<script>
    function validateWithdrawalAmount() {
        const amountInput = document.getElementById('withdrawalAmount');
        const amountError = document.getElementById('amountError');
        const confirmButton = document.getElementById('confirmButton');

        const amount = parseFloat(amountInput.value);

        // Check if the amount is greater than 10
        if (amount >= 10) {
            amountError.classList.add('hidden');
            confirmButton.disabled = false; // Enable the submit button
            // Calculate fee and actual amount
            const fee = amount * 0.05;
            const actualAmount = amount - fee;

            // Update Livewire properties
        @this.set('fee', fee);
        @this.set('actualAmount', actualAmount);
        } else {
            amountError.classList.remove('hidden');
            confirmButton.disabled = true; // Disable the submit button
            // Reset fee and actual amount if invalid
        @this.set('fee', 0);
        @this.set('actualAmount', 0);
        }
    }
</script>
