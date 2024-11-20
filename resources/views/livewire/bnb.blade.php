<section class="flex justify-center items-center bg-gray-100">
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
    <div class="wrapper bg-white rounded-lg shadow-lg overflow-hidden max-w-sm relative">

        <!-- Back arrow section -->
        <div class="absolute top-4 left-4">
            <button onclick="window.history.back()" class="flex items-center text-gray-600 hover:text-teal-600 transition duration-300" aria-label="Go Back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" viewBox="0 0 16 16">
                    <path d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m7 1.133L1.696 8 7.5 11.367zm7.5 0L9.196 8 15 11.367z"/>
                </svg>
            </button>
        </div>

        <!-- Main content -->
        <div class="flex justify-center p-4 bg-gray-50">
            <img src="{{ asset('img/bnb-address.png') }}" alt="TRC20 USDT QR Code" class="h-40 w-auto" />
        </div>

        <!-- Wallet address and copy button -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-md max-w-sm mx-auto">
            <!-- Header -->
            <div class="flex items-center space-x-2 mb-4">
                <span class="text-gray-700 font-semibold">PlanUSDT</span>
            </div>

            <!-- Address -->
            <div class="bg-white p-2 rounded-md flex items-center justify-between mb-4">
                <span class="text-gray-600 text-sm break-all">34q5mMThVkEkENN43NKSkEDnMPVsGkoXJ9</span>
                {{-- <button class="text-white bg-black px-2 py-1 text-xs rounded">Copy</button> --}}
            </div>

            <!-- Button to Open the Popup -->
            <button class="bg-green-500 text-white w-full py-2 rounded-full font-semibold mb-4" onclick="openForm()">
                Complete recharge
            </button>

        </div>
        <!-- Description Section -->
        <div class="bg-gray-100 border border-gray-200 p-6 rounded-lg text-gray-700">
            <h3 class="text-lg font-semibold text-center mb-4">Recharge Instructions</h3>

            <ul class="space-y-3 text-sm leading-relaxed text-left">
                <li class="flex items-start space-x-2">
                    <span class="text-green-500">1.</span>
                    <p>Copy the address above or scan the QR code and select the <strong class="text-blue-600">BNB Smart Chain (BEP20)</strong> network to recharge BNB.</p>
                </li>

                <li class="flex items-start space-x-2">
                    <span class="text-green-500">2.</span>
                    <p>Please do not recharge other non-BNB Smart Chain (BEP20)-BNB assets. The funds will arrive in your account in about <strong class="text-blue-600">1 to 3 minutes</strong> after recharging.</p>
                </li>

                <li class="flex items-start space-x-2">
                    <span class="text-green-500">3.</span>
                    <p>If it does not arrive for a long time, please <strong class="text-blue-600">refresh the page</strong> or <strong class="text-blue-600">contact customer service</strong>.</p>
                </li>
            </ul>
        </div>
        <!-- Rating section -->
        <div class="flex justify-center space-x-1 py-2">
            <!-- Star SVGs for rating -->
{{--            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">--}}
{{--                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>--}}
{{--            </svg>--}}
{{--            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">--}}
{{--                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>--}}
{{--            </svg>--}}
{{--            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">--}}
{{--                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>--}}
{{--            </svg>--}}
{{--            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">--}}
{{--                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>--}}
{{--            </svg>--}}
{{--            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">--}}
{{--                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>--}}
{{--            </svg>--}}
            {{--            <!-- Repeat or adjust SVGs for full rating as needed -->--}}
            {{--            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-gray-200">--}}
            {{--                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>--}}
            {{--            </svg>--}}
        </div>

        <!-- Button to Open the Popup -->
        <button class="bg-green-500 text-white w-full py-2 rounded-full font-semibold mb-4" onclick="openForm()">
            Complete recharge
        </button>

        <!-- Popup Form -->
        <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="myForm">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <h1 class="text-xl font-semibold mb-4">Confirm Deposit</h1>
                <p class="text-sm text-gray-600 mb-4">
                    Please ensure you enter the exact amount of money you deposited using the address above.
                </p>
                <form wire:submit="completeBnbRecharge" onsubmit="return validateAmounts()">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Deposit Amount</label>
                    <input type="number" placeholder="Enter Amount" wire:model="amount" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:border-green-500 p-2">

                    <label for="confirm" class="block text-sm font-medium text-gray-700 mt-4">Confirm Amount</label>
                    <input type="number" placeholder="Confirm Amount" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:border-green-500 p-2">

                    <div class="mt-6 flex justify-between">
                        <button type="submit"
                                class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-400">Submit</button>
                        <button type="button" onclick="closeForm()"
                                class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-400">Close</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Reservation button -->
        <button class="bg-teal-600 w-full flex justify-center py-3 text-white font-semibold transition duration-300 hover:bg-teal-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 mr-1 text-white" viewBox="0 0 16 16">
                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
            </svg>
            Contact Customer Service
        </button>
    </div>
</section>
<!-- JavaScript to Handle Popup and Validation -->
<script>
    function openForm() {
        document.getElementById("myForm").classList.remove("hidden");
    }

    function closeForm() {
        document.getElementById("myForm").classList.add("hidden");
    }

    function validateAmounts() {
        const amount = parseFloat(document.querySelector('input[name="amount"]').value);
        const confirmAmount = parseFloat(document.querySelector('input[name="confirm_amount"]').value);

        if (amount !== confirmAmount) {
            alert("The confirmed amount must match the deposit amount.");
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>
