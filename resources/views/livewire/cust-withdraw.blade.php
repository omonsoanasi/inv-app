@php
    $accountBalance = \App\Models\AccountBalance::where('user_id', auth()->user()->id)->latest()->first();
@endphp
<div class="m-4">
    <div class="credit-card w-full sm:w-auto shadow-lg mx-auto rounded-xl bg-white" x-data="creditCard">
        <header class="flex flex-col justify-center items-center p-4 space-y-4">
            <!-- Front Side -->
            <div
                class="relative w-full h-64 bg-gradient-to-r from-green-300 to-green-600 rounded-xl shadow-lg p-6 text-white"
                x-show="card === 'front'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
            >
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
            <h1 class="text-xl font-semibold text-gray-700 text-center">Details</h1>
            <div>
                <div class="my-3">
                    <input
                        type="text"
                        class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                        placeholder="Quota 10.000 - 1000000.00"
                        maxlength="22"
                        x-model="cardholder"
                    />
                </div>
                <div class="my-3">
                    <input
                        type="text"
                        class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                        placeholder="Withdrawal Address"
                        x-model="cardNumber"
                        x-on:keydown="format()"
                        x-on:keyup="isValid()"
                        maxlength="19"
                    />
                </div>
                <div class="my-3">
                    <label for="" class="text-gray-700">Password</label>
                    <input
                        type="password"
                        class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                        placeholder="password"
                        x-model="password"
                        maxlength="19"
                    />
                </div>
                <div class="my-3">
                    <label for="" class="text-gray-700">Fee</label>
                    <input
                        type="text"
                        class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                        placeholder=""
                        x-model="fee"
                        maxlength="19"
                        disabled
                    />
                </div>
                <div class="my-3">
                    <label for="" class="text-gray-700">Actual Amount Received</label>
                    <input
                        type="text"
                        class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                        placeholder=""
                        x-model="amount_received"
                        maxlength="19"
                        disabled
                    />
                </div>
            </div>
        </main>


        <footer class="mt-6 p-4">
            <button
                class="submit-button px-4 py-3 rounded-full bg-green-300 text-green-900 focus:ring focus:outline-none w-full text-xl font-semibold transition-colors"
                x-bind:disabled="!isValid"
                x-on:click="onSubmit()"
            >
                Confirm
            </button>
        </footer>
    </div>
</div>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("creditCard", () => ({
            init() {
                console.log('Component mounted');
            },
            format() {
                this.cardNumber = this.cardNumber.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
            },
            get isValid() {
                return this.cardholder.length > 5 && this.cardNumber && this.expired.month && this.expired.year && this.securityCode.length === 3;
            },
            onSubmit() {
                alert(`You did it ${this.cardholder}.`);
            },
            cardholder: '',
            cardNumber: '',
            expired: { month: '', year: '' },
            securityCode: '',
            card: 'front',
        }));
    });
</script>
