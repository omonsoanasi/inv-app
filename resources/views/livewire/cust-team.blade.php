<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
        <div>
            <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                Invitation Code
            </p>
        </div>
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
      <span class="relative inline-block">
        <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
          <defs>
            <pattern id="7e5e8ff8-1960-4094-a63a-2a0c0f922d69" x="0" y="0" width=".135" height=".30">
              <circle cx="1" cy="1" r=".7"></circle>
            </pattern>
          </defs>
          <rect fill="url(#7e5e8ff8-1960-4094-a63a-2a0c0f922d69)" width="52" height="24"></rect>
        </svg>
        <span class="relative text-red-600">{{ auth()->user()->referral_code ?? 'NULL' }}</span>
      </span>

        </h2>
        <p class="text-base text-gray-700 md:text-lg">
            Share your referral link to start earning
        </p>
    </div>
    <div class="mx-auto max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center">
            <span class="font-light text-gray-600">Selection Period</span>
{{--            <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">Design</a>--}}
        </div>
        <div class="mt-4 p-4 bg-white shadow rounded-lg space-y-4">
            <h3 class="text-lg font-semibold text-gray-800">Team Summary</h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <div class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-blue-600 bg-blue-100 rounded-full p-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3.992 6 4-1 1-1 1H3Zm8-1a4.5 4.5 0 1 0-9 0h9Z"/>
                </svg>
            </span>
                    <div>
                        <div class="text-sm font-medium text-gray-600">Team Size</div>
                        <div class="text-lg font-semibold text-gray-800">0</div>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-green-600 bg-green-100 rounded-full p-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 6h4v4H0V6zm5 0h4v4H5V6zm5 0h4v4h-4V6zm5 0h1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-1V6zm-5 5h4v4h-4v-4zm-5 0h4v4H5v-4z"/>
                </svg>
            </span>
                    <div>
                        <div class="text-sm font-medium text-gray-600">Team Recharge</div>
                        <div class="text-lg font-semibold text-gray-800">$0.00</div>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-red-600 bg-red-100 rounded-full p-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 6h4v4H0V6zm5 0h4v4H5V6zm5 0h4v4h-4V6zm5 0h1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-1V6zm-5 5h4v4h-4v-4zm-5 0h4v4H5v-4z"/>
                </svg>
            </span>
                    <div>
                        <div class="text-sm font-medium text-gray-600">Team Withdrawal</div>
                        <div class="text-lg font-semibold text-gray-800">$0.00</div>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-indigo-600 bg-indigo-100 rounded-full p-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 6h4v4H0V6zm5 0h4v4H5V6zm5 0h4v4h-4V6zm5 0h1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-1V6zm-5 5h4v4h-4v-4zm-5 0h4v4H5v-4z"/>
                </svg>
            </span>
                    <div>
                        <div class="text-sm font-medium text-gray-600">New Team</div>
                        <div class="text-lg font-semibold text-gray-800">0</div>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-yellow-600 bg-yellow-100 rounded-full p-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 6h4v4H0V6zm5 0h4v4H5V6zm5 0h4v4h-4V6zm5 0h1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-1V6zm-5 5h4v4h-4v-4zm-5 0h4v4H5v-4z"/>
                </svg>
            </span>
                    <div>
                        <div class="text-sm font-medium text-gray-600">First Time Recharge</div>
                        <div class="text-lg font-semibold text-gray-800">0</div>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-purple-600 bg-purple-100 rounded-full p-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 6h4v4H0V6zm5 0h4v4H5V6zm5 0h4v4h-4V6zm5 0h1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-1V6zm-5 5h4v4h-4v-4zm-5 0h4v4H5v-4z"/>
                </svg>
            </span>
                    <div>
                        <div class="text-sm font-medium text-gray-600">First Withdrawal</div>
                        <div class="text-lg font-semibold text-gray-800">0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid max-w-md gap-10 row-gap-5 lg:max-w-screen-lg sm:row-gap-10 lg:grid-cols-3 xl:max-w-screen-lg sm:mx-auto">
        <div class="flex flex-col justify-between p-8 transition-shadow duration-300 bg-green-100 border rounded shadow-sm sm:items-center hover:shadow">
            <div class="text-center">
                <div class="text-lg font-semibold">Level One</div>
                <div class="mt-4 p-4 bg-white shadow rounded-lg space-y-3">
                    <h3 class="text-lg font-semibold text-gray-800">Account Summary</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3.992 6 4-1 1-1 1H3Zm8-1a4.5 4.5 0 1 0-9 0h9Z"/>
                </svg>
                Register/Valid
            </span>
                            <span class="text-gray-800 font-semibold">0 / 0</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M9 3a1 1 0 1 1 0 2H7v3h2a1 1 0 1 1 0 2H7v3a1 1 0 1 1-2 0v-3H3a1 1 0 1 1 0-2h2V5H3a1 1 0 1 1 0-2h4Z"/>
                </svg>
                Commission Rate
            </span>
                            <span class="text-gray-800 font-semibold">10%</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0ZM5.5 7a1.5 1.5 0 1 1 3 0v3a1.5 1.5 0 1 1-3 0V7Zm6 2.5a1 1 0 0 1-1 1h-1.5a1 1 0 0 1 0-2H10.5a1 1 0 0 1 1 1Z"/>
                </svg>
                Total Income
            </span>
                            <span class="text-gray-800 font-semibold">$0.00</span>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <a href="/" class="inline-flex items-center justify-center w-full h-12 px-6 mt-6 font-medium tracking-wide text-white transition duration-200 bg-gray-800 rounded shadow-md hover:bg-gray-900 focus:shadow-outline focus:outline-none">
                    Details
                </a>
                <p class="max-w-xs mt-6 text-xs text-gray-600 sm:text-sm sm:text-center sm:max-w-sm sm:mx-auto">
                    Sed ut unde omnis iste natus accusantium doloremque.
                </p>
            </div>
        </div>
        <div class="flex flex-col justify-between p-8 transition-shadow duration-300 bg-green-200 border rounded shadow-sm sm:items-center hover:shadow">
            <div class="text-center">
                <div class="text-lg font-semibold">Level Two</div>
                <div class="mt-4 p-4 bg-white shadow rounded-lg space-y-3">
                    <h3 class="text-lg font-semibold text-gray-800">Account Summary</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3.992 6 4-1 1-1 1H3Zm8-1a4.5 4.5 0 1 0-9 0h9Z"/>
                </svg>
                Register/Valid
            </span>
                            <span class="text-gray-800 font-semibold">0 / 0</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M9 3a1 1 0 1 1 0 2H7v3h2a1 1 0 1 1 0 2H7v3a1 1 0 1 1-2 0v-3H3a1 1 0 1 1 0-2h2V5H3a1 1 0 1 1 0-2h4Z"/>
                </svg>
                Commission Rate
            </span>
                            <span class="text-gray-800 font-semibold">3%</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0ZM5.5 7a1.5 1.5 0 1 1 3 0v3a1.5 1.5 0 1 1-3 0V7Zm6 2.5a1 1 0 0 1-1 1h-1.5a1 1 0 0 1 0-2H10.5a1 1 0 0 1 1 1Z"/>
                </svg>
                Total Income
            </span>
                            <span class="text-gray-800 font-semibold">$0.00</span>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <a href="/" class="inline-flex items-center justify-center w-full h-12 px-6 mt-6 font-medium tracking-wide text-white transition duration-200 bg-gray-800 rounded shadow-md hover:bg-gray-900 focus:shadow-outline focus:outline-none">
                    Details
                </a>
                <p class="max-w-xs mt-6 text-xs text-gray-600 sm:text-sm sm:text-center sm:max-w-sm sm:mx-auto">
                    Sed ut unde omnis iste natus accusantium doloremque.
                </p>
            </div>
        </div>
        <div class="flex flex-col justify-between p-8 transition-shadow duration-300 bg-green-300 border rounded shadow-sm sm:items-center hover:shadow">
            <div class="text-center">
                <div class="text-lg font-semibold">Level Three</div>
                <div class="mt-4 p-4 bg-white shadow rounded-lg space-y-3">
                    <h3 class="text-lg font-semibold text-gray-800">Account Summary</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3.992 6 4-1 1-1 1H3Zm8-1a4.5 4.5 0 1 0-9 0h9Z"/>
                </svg>
                Register/Valid
            </span>
                            <span class="text-gray-800 font-semibold">0 / 0</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M9 3a1 1 0 1 1 0 2H7v3h2a1 1 0 1 1 0 2H7v3a1 1 0 1 1-2 0v-3H3a1 1 0 1 1 0-2h2V5H3a1 1 0 1 1 0-2h4Z"/>
                </svg>
                Commission Rate
            </span>
                            <span class="text-gray-800 font-semibold">3%</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg shadow-sm">
            <span class="text-gray-600 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-600" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0ZM5.5 7a1.5 1.5 0 1 1 3 0v3a1.5 1.5 0 1 1-3 0V7Zm6 2.5a1 1 0 0 1-1 1h-1.5a1 1 0 0 1 0-2H10.5a1 1 0 0 1 1 1Z"/>
                </svg>
                Total Income
            </span>
                            <span class="text-gray-800 font-semibold">$0.00</span>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <a href="/" class="inline-flex items-center justify-center w-full h-12 px-6 mt-6 font-medium tracking-wide text-white transition duration-200 bg-gray-800 rounded shadow-md hover:bg-gray-900 focus:shadow-outline focus:outline-none">
                    Details
                </a>
                <p class="max-w-xs mt-6 text-xs text-gray-600 sm:text-sm sm:text-center sm:max-w-sm sm:mx-auto">
                    Sed ut unde omnis iste natus accusantium doloremque.
                </p>
            </div>
        </div>
    </div>
</div>
