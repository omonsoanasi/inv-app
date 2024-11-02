@php
    $headerCarousels = \App\Models\HeaderTextCarousel::all();
    $heroSection = \App\Models\HeroSection::first();
    $activities = \App\Models\Activity::latest()->limit(10)->get();
    $regulators = \App\Models\RegulatedBy::latest()->limit(2)->get();
    $howTo = \App\Models\HowTo::first();
@endphp
<x-guest-layout>
    <div
        x-data="{
        current: 0,
        startCarousel() {
            this.autoSlide = setInterval(() => {
                this.current = (this.current + 1) % this.$refs.texts.children.length;
            }, 1500);
        },
        stopCarousel() {
            clearInterval(this.autoSlide);
        }
    }"
        x-init="startCarousel()"
        @mouseover="stopCarousel()"
        @mouseleave="startCarousel()"
        class="relative h-10 w-full bg-indigo-600 text-white overflow-hidden"
        x-ref="texts"
    >
        @foreach($headerCarousels as $index => $headerCarousel)
            <!-- Carousel Text -->
            <div class="absolute inset-0 flex justify-center items-center text-center transition-opacity duration-500"
                 x-show="current === {{ $index }}"
                 x-transition:enter="transition-opacity"
                 x-transition:leave="transition-opacity"
                 x-transition:enter-start="opacity-0"
                 x-transition:leave-end="opacity-0">
                <p class="text-sm font-bold">{{ $headerCarousel->header_carousel_text }}</p>
            </div>
        @endforeach
    </div>

    <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply h-auto rounded-lg">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-4 lg:py-5">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">{{ $heroSection->title ?? 'Not set' }}</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">{{ $heroSection->text ?? 'Not set' }}</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    {{ $heroSection->call_to_action ?? 'Not set' }}
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <div class=" p-3 space-y-4 z-0">
        <h4 class="font-semibold mt-2">Actions</h4>
        <div class="flex items-center justify-between overflow-y-scroll text-gray-500 cursor-pointer space-x-3">
            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-green-200 rounded-2xl text-green-600 shadow hover:shadow-md cursor-pointer mb-2 p-1 bg-white transition ease-in duration-300">
                <i class="far fa-hotel"></i>
                <p class="text-sm mt-1">Recharge</p>
            </div>
            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-yellow-200 rounded-2xl text-yellow-600  shadow hover:shadow-md cursor-pointer mb-2 p-1 bg-white transition ease-in duration-300">
                <i class="far fa-bus"></i>
                <p class="text-sm mt-1">Withdraw</p>
            </div>

            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-indigo-200  rounded-2xl  text-indigo-500 shadow hover:shadow-md cursor-pointer mb-2 p-1 bg-white transition ease-in duration-300">
                <i class="far fa-mountains"></i>
                <p class="text-sm mt-1">Our Company</p>
            </div>
        </div>
        <h4 class="font-semibold">Activities</h4>
        <div class="grid grid-cols-2 gap-4 overflow-y-scroll w-full">
            @foreach($activities as $activity)
                <div class="relative flex flex-col justify-between bg-white shadow-md rounded-3xl bg-cover text-gray-800 overflow-hidden cursor-pointer w-full object-cover object-center h-64 my-2"
                     style="background-image:url('https://images.unsplash.com/reserve/8T8J12VQxyqCiQFGa2ct_bahamas-atlantis.jpg?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80')">
                    <div class="absolute bg-gradient-to-t from-green-400 to-blue-400 opacity-50 inset-0 z-0"></div>
                    <div class="relative flex flex-row items-end h-72 w-full">
                        <div class="absolute right-0 top-0 m-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-9 w-9 p-2 text-gray-200 hover:text-blue-400 rounded-full hover:bg-white transition ease-in duration-200" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                            </svg>
                        </div>
                        <div class="p-6 rounded-lg flex flex-col w-full z-10">
                            <h4 class="mt-1 text-white text-xl font-semibold leading-tight ">{{ $activity->activity_name }}
                            </h4>
                            <div class="flex pt-4 text-sm text-gray-300">
                                <div class="flex items-center font-medium text-white">
                                    ${{ number_format($activity->activity_commission,2) }} <span class="text-gray-300 text-sm font-normal"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


        <h4 class="font-semibold">Member Activities</h4>
        <div x-data="{
    deposits: [
        { name: 'John Doe', amount: '$150', time: '2 minutes ago' },
        { name: 'Jane Smith', amount: '$200', time: '5 minutes ago' },
        { name: 'Alice Johnson', amount: '$350', time: '10 minutes ago' },
        { name: 'Bob Brown', amount: '$50', time: '15 minutes ago' },
        { name: 'Charlie Davis', amount: '$100', time: '20 minutes ago' },
    ],
    newDeposit: { name: '', amount: '', time: '' },
    maxDeposits: 5,
    scrollSpeed: 1, // Speed of the scroll in pixels per frame
    scrollPosition: 0,
    listHeight: 0,
    containerHeight: 0,
    interval: null,

    addDeposit() {
        this.newDeposit = { name: `User ${Math.floor(Math.random() * 100)}`, amount: `$${Math.floor(Math.random() * 500 + 1)}`, time: 'Just now' };
        this.deposits.push(this.newDeposit); // Add new deposit to the end
        if (this.deposits.length > this.maxDeposits) {
            this.deposits.shift(); // Maintain only the latest 5 deposits
        }
    },

    startScroll() {
        // Start scrolling once the DOM is ready
        this.$nextTick(() => {
            this.listHeight = this.$refs.list.scrollHeight; // Total height of the list (including duplicated items)
            this.containerHeight = this.$refs.container.clientHeight; // Height of the visible container

            // Scroll the list continuously
            this.interval = setInterval(() => {
                this.scrollPosition -= this.scrollSpeed;

                // Reset scroll position when it reaches the end of the list
                if (this.scrollPosition <= -this.listHeight / 2) {
                    this.scrollPosition = 0;
                }
            }, 1000 / 60); // 60 FPS
        });
    },

    stopScroll() {
        clearInterval(this.interval);
    }
}" x-init="startScroll()" class="grid grid-cols-1">
            <div>
                <!-- Deposits List -->
                <div x-ref="container" class="relative h-40 overflow-hidden">
                    <div x-ref="list" class="absolute" :style="`transform: translateY(${scrollPosition}px)`">
                        <!-- Original Deposits List -->
                        <template x-for="(deposit, index) in deposits" :key="index">
                            <div class="flex justify-between items-center p-2 border-b border-gray-200">
                                <span class="font-medium" x-text="deposit.name"></span>
                                <span class="text-green-500" x-text="deposit.amount"></span>
                                <span class="text-gray-500 text-sm" x-text="deposit.time"></span>
                            </div>
                        </template>
                        <!-- Duplicated Deposits List -->
                        <template x-for="(deposit, index) in deposits" :key="index + '_duplicate'">
                            <div class="flex justify-between items-center p-2 border-b border-gray-200">
                                <span class="font-medium" x-text="deposit.name"></span>
                                <span class="text-green-500" x-text="deposit.amount"></span>
                                <span class="text-gray-500 text-sm" x-text="deposit.time"></span>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Button to simulate new deposits -->
            <button @click="addDeposit()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">
                Add Deposit
            </button>
        </div>

        <h4 class="font-semibold">Regulated By</h4>
        <div class="grid grid-cols-1">
            @foreach($regulators as $regulator)
                <div class="">
                    <div class="flex  bg-white shadow-md  rounded-2xl p-2">
                        <img src="https://images.unsplash.com/photo-1439130490301-25e322d88054?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80"
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
                            {{--                            <div class="flex pt-2  text-sm text-gray-400">--}}
                            {{--                                <div class="flex items-center mr-auto">--}}
                            {{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-1"--}}
                            {{--                                         viewBox="0 0 20 20" fill="currentColor">--}}
                            {{--                                        <path--}}
                            {{--                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">--}}
                            {{--                                        </path>--}}
                            {{--                                    </svg>--}}
                            {{--                                    <p class="font-normal">4.5</p>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="flex items-center font-medium text-gray-900 ">--}}
                            {{--                                    $1800--}}
                            {{--                                    <span class="text-gray-400 text-sm font-normal"> /wk</span>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h4 class="font-semibold">How to use this platform</h4>
        <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply h-auto rounded-lg">
            <div class="px-4 mx-auto max-w-screen-xl text-center py-4 lg:py-5">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                    {{ $howTo->how_title ?? 'Not set' }}</h1>
                <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">{{ $howTo->how_text ?? 'Not set' }}</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        {{ $howTo->how_call_to_action ?? 'Not set' }}
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </div>

</x-guest-layout>
