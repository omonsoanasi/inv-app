@php
    $headerCarousels = \App\Models\HeaderTextCarousel::all();
    $heroSection = \App\Models\HeroSection::first();
    $activities = \App\Models\Activity::orderByRaw('CAST(activity_commission AS SIGNED) ASC')->limit(10)->get();
    $regulators = \App\Models\RegulatedBy::latest()->limit(2)->get();
    $howTo = \App\Models\HowTo::first();
@endphp
<x-app-layout>
    <div
        class="relative h-10 w-full bg-indigo-600 text-white overflow-hidden rounded-lg mb-2"
        onmouseover="stopCarousel()"
        onmouseleave="startCarousel()"
        id="carousel-container"
    >
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
        @foreach($headerCarousels as $index => $headerCarousel)
            <!-- Carousel Text -->
            <div class="absolute inset-0 flex justify-center items-center text-center transition-opacity duration-500"
                 data-index="{{ $index }}"
                 style="opacity: {{ $index === 0 ? '1' : '0' }};">
                <p class="text-sm font-bold">{{ $headerCarousel->header_carousel_text }}</p>
            </div>
        @endforeach
    </div>
    <section
        class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply h-auto rounded-lg">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-4 lg:py-5">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">{{ $heroSection->title ?? 'Not set' }}</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">{{ $heroSection->text ?? 'Not set' }}</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('cust-recharge') }}"
                   class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    {{ $heroSection->call_to_action ?? 'Not set' }}
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <div class=" p-3 space-y-4 z-0">
        <h4 class="font-semibold mt-2">Actions</h4>
        <div class="flex items-center justify-between overflow-y-scroll text-gray-500 cursor-pointer space-x-3">
            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-green-600 rounded-2xl text-green-600 shadow hover:shadow-md cursor-pointer mb-2 p-1 transition ease-in duration-300">
                <!-- Recharge Link -->
                <a href="{{ route('cust-recharge') }}" class="text-sm font-extrabold text-white mt-1">
                    <p>Recharge</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="h-6 w-6 text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                        <path
                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                        <path
                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                    </svg>
                </a>

                <!-- Modal Structure -->
                <div id="modal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-2xl relative">
                        <!-- Close Button -->
                        <button onclick="closeModal()"
                                class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 absolute top-3 right-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <!-- Modal Content Container with Scrolling -->
                        <div class="overflow-y-auto max-h-[75vh] p-4">
                            <!-- TRC20 Address Iframe -->
                            <iframe id="trc20Iframe" src="" class="w-full h-96 border-0"></iframe>
                            <span class="bg-gray-500">TBDrVr29z7XhXxBNrfBCVWnJQvwsqPutpc</span>
                            <!-- Deposit Instructions -->
                            <div
                                class="mt-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg text-gray-800 dark:text-gray-200">
                                <h3 class="text-lg font-semibold mb-2">Deposit Instructions</h3>
                                <p>Please send the required amount of USDT to the TRC20 address shown above. Ensure you
                                    are using a compatible wallet, and double-check the address before proceeding with
                                    the transfer.</p>
                                <ul class="list-disc ml-5 mt-2">
                                    <li>Use the exact TRC20 network to avoid any loss of funds.</li>
                                    <li>Allow a few minutes for the transaction to reflect in your balance.</li>
                                    <li>If you encounter any issues, please contact support.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-yellow-600 rounded-2xl text-yellow-600  shadow hover:shadow-md cursor-pointer mb-2 p-1 transition ease-in duration-300">
                <i class="far fa-bus"></i>
                <a href="{{ auth()->check() ? route('cust-withdraw') : route('login') }}">
                    <p class="text-sm font-extrabold text-white mt-1">Withdraw</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="h-6 w-6 text-white" viewBox="0 0 16 16">
                        <path
                            d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                    </svg>
                </a>
            </div>
            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-amber-800 rounded-2xl text-amber-600  shadow hover:shadow-md cursor-pointer mb-2 p-1 transition ease-in duration-300">
                <a href="{{ auth()->check() ? route('cust-withdraw') : route('login') }}">
                    <p class="text-sm font-extrabold text-white mt-1">Application</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="h-6 w-6 text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0m-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
                    </svg>
                </a>
            </div>
            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-indigo-200  rounded-2xl  text-indigo-500 shadow hover:shadow-md cursor-pointer mb-2 p-1 bg-white transition ease-in duration-300">
                <i class="far fa-mountains"></i>
                <p class="text-sm font-extrabold mt-1">Our Company</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6"
                     viewBox="0 0 16 16">
                    <path
                        d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z"/>
                </svg>
            </div>
        </div>
        <!-- Button to Open Pop-Up -->
        <div class="bg-green-200 p-4 rounded-lg mb-4">
            <button id="openPopup"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-5 w-5 mr-2"
                     viewBox="0 0 16 16">
                    <path
                        d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 75 75 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0m-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233q.27.015.537.036c2.568.189 5.093.744 7.463 1.993zm-9 6.215v-4.13a95 95 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A61 61 0 0 1 4 10.065m-.657.975l1.609 3.037.01 .024h .548l-.002-.014-.443 -2 .966a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .68 a68 .680z"/>
                </svg>
                Announcements
            </button>
        </div>

        <!-- Pop-Up Window -->
        <div id="popup" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm text-center">
                <h2 class="text-lg font-bold mb-4">Welcome!</h2>
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg text-left">
                    <h2 class="text-lg font-bold mb-4">How to Use PlanUSDT</h2>
                    <p class="mb-4">Welcome to PlanUSDT! Here’s a quick guide on how to use the app:</p>
                    <ul class="list-disc list-inside mb-4">
                        <li><strong>Complete Activities:</strong> You can complete various activities available in the
                            app to earn commissions.
                        </li>
                        <li><strong>Wait for Task Resets:</strong> After completing an activity, you must wait until the
                            task resets before you can complete it again.
                        </li>
                        <li><strong>Upgrade Your Account:</strong> Recharge your account to unlock more tasks and earn
                            higher commission returns.
                        </li>
                    </ul>
                </div>
                <button id="closePopup" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Close
                </button>
            </div>
        </div>

        <!-- Activities Section -->
        <h4 class="font-semibold">Activities</h4>
        <div class="grid grid-cols-2 gap-4 overflow-y-scroll w-full relative">
            @foreach($activities as $activity)
                @if($activity->user_type == 0)
                    <a href="{{ auth()->check() ? route('activity-page', $activity->id) : route('login') }}">
                        <div
                            class="relative flex flex-col justify-between bg-white shadow-md rounded-3xl bg-cover text-gray-800 overflow-hidden cursor-pointer w-full object-cover object-center h-64 my-2"
                            style="background-image:url('https://images.unsplash.com/reserve/8T8J12VQxyqCiQFGa2ct_bahamas-atlantis.jpg?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80')">
                            <div
                                class="absolute bg-gradient-to-t from-green-400 to-blue-400 opacity-50 inset-0 z-0"></div>
                            <div class="relative flex flex-row items-end h-72 w-full">
                                <div class="absolute right-0 top-0 m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="h-9 w-9 p-2 text-gray-200 hover:text-blue-400 rounded-full hover:bg-white transition ease-in duration-200"
                                         viewBox="0 0 16 16">
                                        <path d="..."></path>
                                    </svg>
                                </div>
                                <div class="p-6 rounded-lg flex flex-col w-full z-10">
                                    <h4 class="mt-1 text-white text-xl font-semibold leading-tight ">{{ $activity->activity_name }}</h4>
                                    <div class="flex pt-4 text-sm text-gray-300">
                                        <div class="flex items-center font-medium text-white">
                                            ${{ number_format($activity->activity_commission,2) }}
                                            <span class="text-gray-300 text-sm font-normal"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @else
                    @if(auth()->check() && (auth()->user()->accountBalance?->total_amount) < $activity->activity_commission)
                        <button onclick="showUpgradeAlert()" class="w-full h-full">
                            <div
                                class="relative flex flex-col justify-between bg-white shadow-md rounded-3xl bg-cover text-gray-800 overflow-hidden cursor-pointer w-full object-cover object-center h-64 my-2"
                                style="background-image:url('https://images.unsplash.com/reserve/8T8J12VQxyqCiQFGa2ct_bahamas-atlantis.jpg?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80')">
                                <div class="absolute bg-gradient-to-t from-green-400 to-blue-400 opacity-50 inset-0 z-0"></div>
                                <div class="relative flex flex-row items-end h-72 w-full">
                                    <div class="p-6 rounded-lg flex flex-col w-full z-10">
                                        <h4 class="mt-1 text-white text-xl font-semibold leading-tight ">{{ $activity->activity_name }}</h4>
                                        <div class="flex pt-4 text-sm text-gray-300">
                                            <div class="flex items-center font-medium text-white">
                                                ${{ number_format($activity->activity_commission,2) }}
                                                <span class="text-gray-300 text-sm font-normal"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    @else
                        <a href="{{ auth()->check() ? route('activity-page', $activity->id) : route('login') }}">
                            <button onclick="showUpgradeAlert()" class="w-full h-full">
                                <div
                                    class="relative flex flex-col justify-between bg-white shadow-md rounded-3xl bg-cover text-gray-800 overflow-hidden cursor-pointer w-full object-cover object-center h-64 my-2"
                                    style="background-image:url('https://images.unsplash.com/reserve/8T8J12VQxyqCiQFGa2ct_bahamas-atlantis.jpg?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80')">
                                    <div
                                        class="absolute bg-gradient-to-t from-green-400 to-blue-400 opacity-50 inset-0 z-0"></div>
                                    <div class="relative flex flex-row items-end h-72 w-full">
                                        <div class="p-6 rounded-lg flex flex-col w-full z-10">
                                            <h4 class="mt-1 text-white text-xl font-semibold leading-tight ">{{ $activity->activity_name }}</h4>
                                            <div class="flex pt-4 text-sm text-gray-300">
                                                <div class="flex items-center font-medium text-white">
                                                    ${{ number_format($activity->activity_commission,2) }}
                                                    <span class="text-gray-300 text-sm font-normal"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </a>
                    @endif
                @endif
            @endforeach
        </div>


        <h4 class="font-semibold">Member Activities</h4>
        <div class="grid grid-cols-1" id="deposit-container">
            <div>
                <!-- Deposits List -->
                <div id="scroll-container" class="relative h-40 overflow-hidden">
                    <div id="scroll-list" class="absolute">
                        <!-- Original Deposits List -->
                        <div class="flex justify-between items-center p-2 border-b border-gray-200">
                            <span class="font-medium">John Doe</span>
                            <span class="text-green-500">$150</span>
                            <span class="text-gray-500 text-sm">2 minutes ago</span>
                        </div>
                        <div class="flex justify-between items-center p-2 border-b border-gray-200">
                            <span class="font-medium">Jane Smith</span>
                            <span class="text-green-500">$200</span>
                            <span class="text-gray-500 text-sm">5 minutes ago</span>
                        </div>
                        <div class="flex justify-between items-center p-2 border-b border-gray-200">
                            <span class="font-medium">Alice Johnson</span>
                            <span class="text-green-500">$350</span>
                            <span class="text-gray-500 text-sm">10 minutes ago</span>
                        </div>
                        <div class="flex justify-between items-center p-2 border-b border-gray-200">
                            <span class="font-medium">Bob Brown</span>
                            <span class="text-green-500">$50</span>
                            <span class="text-gray-500 text-sm">15 minutes ago</span>
                        </div>
                        <div class="flex justify-between items-center p-2 border-b border-gray-200">
                            <span class="font-medium">Charlie Davis</span>
                            <span class="text-green-500">$100</span>
                            <span class="text-gray-500 text-sm">20 minutes ago</span>
                        </div>
                        <!-- Duplicated Deposits List (for smooth scroll looping) -->
                    </div>
                </div>
            </div>

            <!-- Button to simulate new deposits -->
            <a href="{{ route('cust-recharge') }}">
                <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">
                    Add Deposit
                </button>
            </a>
        </div>

        <h4 class="font-semibold">Regulated By</h4>
        <div class="grid grid-cols-1">
            @foreach($regulators as $regulator)
                <div class="mt-4">
                    <div class="flex  bg-white shadow-md  rounded-2xl p-2">
                        <img
                            src="https://images.unsplash.com/photo-1439130490301-25e322d88054?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80"
                            alt="Just a flower" class=" w-16  object-cover  h-16 rounded-xl">
                        <div class="flex flex-col justify-center w-full px-2 py-1">
                            <div class="flex justify-between items-center ">
                                <div class="flex flex-col">
                                    <h2 class="text-sm font-medium">{{ $regulator->regulator_name }}</h2>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 text-gray-500 hover:text-blue-400 cursor-pointer" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h4 class="font-semibold">How to use this platform</h4>
        <section
            class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply h-auto rounded-lg">
            <div class="px-4 mx-auto max-w-screen-xl text-center py-4 lg:py-5">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                    {{ $howTo->how_title ?? 'Not set' }}</h1>
                <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">{{ $howTo->how_text ?? 'Not set' }}</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="#"
                       class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        {{ $howTo->how_call_to_action ?? 'Not set' }}
{{--                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"--}}
{{--                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">--}}
{{--                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                  d="M1 5h12m0 0L9 1m4 4L9 9"/>--}}
{{--                        </svg>--}}
                    </a>
                </div>
            </div>
        </section>
    </div>
    <script>
        let current = 0;
        let autoSlide;

        function showSlide(index) {
            const slides = document.querySelectorAll('#carousel-container > div');
            slides.forEach((slide, idx) => {
                slide.style.opacity = idx === index ? '1' : '0';
            });
        }

        function startCarousel() {
            autoSlide = setInterval(() => {
                const slides = document.querySelectorAll('#carousel-container > div');
                current = (current + 1) % slides.length;
                showSlide(current);
            }, 1500);
        }

        function stopCarousel() {
            clearInterval(autoSlide);
        }

        document.addEventListener('DOMContentLoaded', () => {
            startCarousel();
        });
    </script>
    <script>
        const deposits = [
            {name: 'John Doe', amount: '$150', time: '2 minutes ago'},
            {name: 'Jane Smith', amount: '$200', time: '5 minutes ago'},
            {name: 'Alice Johnson', amount: '$350', time: '10 minutes ago'},
            {name: 'Bob Brown', amount: '$50', time: '15 minutes ago'},
            {name: 'Charlie Davis', amount: '$100', time: '20 minutes ago'}
        ];
        const maxDeposits = 5;
        const scrollSpeed = 1;
        let scrollPosition = 0;
        let interval;

        // Add Deposit Function
        function addDeposit() {
            const newDeposit = {
                name: `User ${Math.floor(Math.random() * 100)}`,
                amount: `$${Math.floor(Math.random() * 500 + 1)}`,
                time: 'Just now'
            };
            deposits.push(newDeposit);
            if (deposits.length > maxDeposits) {
                deposits.shift();
            }
            renderDeposits();
        }

        // Render Deposits Function
        function renderDeposits() {
            const scrollList = document.getElementById('scroll-list');
            scrollList.innerHTML = deposits.concat(deposits).map(deposit => `
            <div class="flex justify-between items-center p-2 border-b border-gray-200">
                <span class="font-medium">${deposit.name}</span>
                <span class="text-green-500">${deposit.amount}</span>
                <span class="text-gray-500 text-sm">${deposit.time}</span>
            </div>
        `).join('');
        }

        // Scroll Function
        function startScroll() {
            const scrollContainer = document.getElementById('scroll-container');
            const scrollList = document.getElementById('scroll-list');

            interval = setInterval(() => {
                scrollPosition -= scrollSpeed;
                scrollList.style.transform = `translateY(${scrollPosition}px)`;

                // Reset scroll position for smooth loop
                if (scrollPosition <= -scrollList.scrollHeight / 2) {
                    scrollPosition = 0;
                }
            }, 1000 / 60);
        }

        function stopScroll() {
            clearInterval(interval);
        }

        // Initialize Scroll and Render
        document.addEventListener('DOMContentLoaded', () => {
            renderDeposits();
            startScroll();
        });

        // Stop scroll on mouseover and start on mouseleave
        document.getElementById('scroll-container').addEventListener('mouseover', stopScroll);
        document.getElementById('scroll-container').addEventListener('mouseleave', startScroll);
    </script>
    <script>
        const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};

        function openModal(event) {
            event.preventDefault();
            if (isAuthenticated) {
                document.getElementById('trc20Iframe').src = 'https://tronscan.org/#/address/0x973182dB27E929e76BB35ff2C08aec6a90BB7614';
                document.getElementById('modal').classList.remove('hidden');
                document.getElementById('modal').classList.add('flex');
            } else {
                window.location.href = "{{ route('login') }}";
            }
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('modal').classList.remove('flex');
            document.getElementById('trc20Iframe').src = '';
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showUpgradeAlert() {
            Swal.fire({
                title: 'Upgrade Required',
                text: 'You need an upgrade to access this activity.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }
    </script>
    <script>
        // Function to show the pop-up
        function showPopup() {
            document.getElementById('popup').classList.remove('hidden');
        }

        // Check if the pop-up has been shown before
        if (!localStorage.getItem('popupShown')) {
            // Show the pop-up if it hasn't been shown
            showPopup();
            localStorage.setItem('popupShown', 'true');
        }

        // Open the pop-up when the button is clicked
        document.getElementById('openPopup').onclick = showPopup;

        // Close the pop-up when the close button is clicked
        document.getElementById('closePopup').onclick = function () {
            document.getElementById('popup').classList.add('hidden');
        };
    </script>
</x-app-layout>
