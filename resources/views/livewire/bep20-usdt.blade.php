<section class="flex justify-center items-center bg-gray-100">
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
            <img src="{{ asset('img/bep-20.png') }}" alt="TRC20 USDT QR Code" class="h-40 w-auto" />
        </div>

        <!-- Wallet address and copy button -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-md max-w-sm mx-auto">
            <!-- Header -->
            <div class="flex items-center space-x-2 mb-4">
                <span class="text-gray-700 font-semibold">PlanUSDT</span>
            </div>

            <!-- Address -->
            <div class="bg-white p-2 rounded-md flex items-center justify-between mb-4">
                <span class="text-gray-600 text-sm break-all">0x09d800fdfe56a35ed655b88edb29610c13f4be3d</span>
                {{-- <button class="text-white bg-black px-2 py-1 text-xs rounded">Copy</button> --}}
            </div>

            <!-- Button -->
            <button class="bg-green-500 text-white w-full py-2 rounded-full font-semibold">
                Recharge completed
            </button>
        </div>
        <!-- Description Section -->
        <div class="bg-gray-100 border border-gray-200 p-6 rounded-lg text-gray-700">
            <h3 class="text-lg font-semibold text-center mb-4">Deposit Instructions</h3>

            <ul class="space-y-3 text-sm leading-relaxed text-left">
                <li class="flex items-start space-x-2">
                    <span class="text-green-500">1.</span>
                    <p>Copy the address above or scan the QR code and select the <strong class="text-blue-600">BNB Smart Chain (BEP20)</strong> network to deposit USDT.</p>
                </li>

                <li class="flex items-start space-x-2">
                    <span class="text-green-500">2.</span>
                    <p>Please do not recharge other non-BNB Smart Chain (BEP20)-USDT assets. The funds will arrive in your account in about <strong class="text-blue-600">1 to 3 minutes</strong> after recharging.</p>
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
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            {{--            <!-- Repeat or adjust SVGs for full rating as needed -->--}}
            {{--            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-gray-200">--}}
            {{--                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>--}}
            {{--            </svg>--}}
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

