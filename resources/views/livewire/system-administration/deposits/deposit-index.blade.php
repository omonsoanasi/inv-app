<div>
    <div class="flex flex-wrap -mx-2">

        <div class="w-full sm:w-1/2 px-2 mt-4">
            <div
                class="p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">TRC20-USDT Deposits</h5>
                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                    @foreach($trc20UsdtDeposits as $trc20UsdtDeposit)
                        <li class="flex mb-2 items-center justify-between bg-gray-100 dark:bg-gray-800 rounded-lg p-4 shadow hover:shadow-lg transition-shadow">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 me-3 text-green-500 dark:text-green-400 flex-shrink-0"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="text-gray-800 dark:text-gray-200 font-medium">
            {{ $trc20UsdtDeposit->user->name }} - {{ $trc20UsdtDeposit->user->email }}
        </span>
                                <span class="text-gray-800 dark:text-gray-200 font-medium">
            $ {{ number_format($trc20UsdtDeposit->amount, 2) }}
        </span>
                            </div>
                            @if($trc20UsdtDeposit->confirmed == true)
                                <div class="flex items-center space-x-4">
                                        <!-- Confirm Button -->
                                        <button
                                            class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                                            type="button" disabled >
                                            Payment Confirmed
                                        </button>
                                    </a>
                                </div>
                            @else
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('confirm-trc20-payment', $trc20UsdtDeposit->id) }}">
                                        <!-- Confirm Button -->
                                        <button
                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Confirm User Account
                                        </button>
                                    </a>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
                {{ $trc20UsdtDeposits->links() }}
            </div>
        </div>

        <div class="w-full sm:w-1/2 px-2 mt-4">
            <div
                class="p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">BEP20-USDT Deposits</h5>
                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                    @foreach($bep20UsdtDeposits as $bep20UsdtDeposit)
                        <li class="flex mb-2 items-center justify-between bg-gray-100 dark:bg-gray-800 rounded-lg p-4 shadow hover:shadow-lg transition-shadow">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 me-3 text-green-500 dark:text-green-400 flex-shrink-0"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="text-gray-800 dark:text-gray-200 font-medium">
            {{ $bep20UsdtDeposit->user->name }} - {{ $bep20UsdtDeposit->user->email }}
        </span>
                                <span class="text-gray-800 dark:text-gray-200 font-medium">
            $ {{ number_format($bep20UsdtDeposit->amount, 2) }}
        </span>
                            </div>
                            @if($bep20UsdtDeposit->confirmed == true)
                                <div class="flex items-center space-x-4">
                                    <!-- Confirm Button -->
                                    <button
                                        class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                                        type="button" disabled >
                                        Payment Confirmed
                                    </button>
                                    </a>
                                </div>
                            @else
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('confirm-bep20-payment', $bep20UsdtDeposit->id) }}">
                                        <!-- Confirm Button -->
                                        <button
                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Confirm User Account {{ $bep20UsdtDeposit->accountBalance }}
                                        </button>
                                    </a>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
                {{ $bep20UsdtDeposits->links() }}
            </div>
        </div>

        <div class="w-full sm:w-1/2 px-2 mt-4">
            <div
                class="p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">BNB Deposits</h5>
                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                    @foreach($bnbDeposits as $bnbDeposit)
                        <li class="flex mb-2 items-center justify-between bg-gray-100 dark:bg-gray-800 rounded-lg p-4 shadow hover:shadow-lg transition-shadow">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 me-3 text-green-500 dark:text-green-400 flex-shrink-0"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="text-gray-800 dark:text-gray-200 font-medium">
            {{ $bnbDeposit->user->name }} - {{ $bnbDeposit->user->email }}
        </span>
                                <span class="text-gray-800 dark:text-gray-200 font-medium">
            $ {{ number_format($bnbDeposit->amount, 2) }}
        </span>
                            </div>
                            @if($bnbDeposit->confirmed == true)
                                <div class="flex items-center space-x-4">
                                    <!-- Confirm Button -->
                                    <button
                                        class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                                        type="button" disabled >
                                        Payment Confirmed
                                    </button>
                                    </a>
                                </div>
                            @else
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('confirm-bnb-payment', $bnbDeposit->id) }}">
                                        <!-- Confirm Button -->
                                        <button
                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Confirm User Account
                                        </button>
                                    </a>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
                {{ $trc20UsdtDeposits->links() }}
            </div>
        </div>
    </div>
</div>
