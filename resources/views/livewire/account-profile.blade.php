<div class="container mx-auto">
    <div>

        <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
            <div class="flex justify-center">
                <img src="{{ asset('img/logo.png') }}" alt="" class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110">
            </div>

            <div class="mt-16">
                <h1 class="font-bold text-center text-3xl text-gray-900">Hello, {{ auth()->user()->email }}</h1>
                <p class="text-center text-sm text-gray-400 font-medium">Total Balance: 0.00 (USDT)</p>
                <p>
                        <span>

                        </span>
                </p>
                <div class="my-5 px-6">
                    <a href="#" class="text-gray-200 block rounded-lg text-center font-medium leading-6 px-6 py-3 bg-gray-900 hover:bg-black hover:text-white">VIP - 0 <span class="font-bold">Save Money and Time</span></a>
                </div>
                <div class="flex justify-between items-center my-5 px-6">
                    <a href="#" class="font-extrabold text-green-500 hover:text-green-900 hover:bg-green-100 rounded transition duration-150 ease-in text-sm text-center w-full py-3 flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-12 w-12 mb-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                        </svg>
                        <span>Recharge</span>
                    </a>
                    <a href="#" class="font-extrabold text-green-500 hover:text-green-900 hover:bg-green-100 rounded transition duration-150 ease-in text-sm text-center w-full py-3 flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-12 w-12" viewBox="0 0 16 16">
                            <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                            <path d="M11 11.5a.5.5 0 0 1 .5-.5h4a.5.5 0 1 1 0 1h-4a.5.5 0 0 1-.5-.5"/>
                        </svg>
                        <span>Withdraw</span>
                    </a>
                    <a href="#" class="font-extrabold text-green-500 hover:text-green-900 hover:bg-green-100 rounded transition duration-150 ease-in text-sm text-center w-full py-3 flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-12 w-12" viewBox="0 0 16 16">
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h3v2zm4 0v-2h3v1a1 1 0 0 1-1 1zm3-3h-3v-2h3zm-7 0v-2h3v2z"/>
                        </svg>
                        <span>Financial Records</span>
                    </a>
                </div>

                <div class="w-full">
                    <h3 class="font-medium text-gray-900 text-left px-6">Account Settings</h3>
                    <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                        <a href="{{ route('profile') }}" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                            <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                            Change Password
                            <span class="text-gray-500 text-xs">>></span>
                        </a>

                        <a href="#" wire:click="logout" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                            <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                            Sign Out
                            <span class="text-gray-500 text-xs">>></span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
