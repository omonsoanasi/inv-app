@php
    $headerCarousels = \App\Models\HeaderTextCarousel::all();
    $heroSection = \App\Models\HeroSection::first();
    $activities = \App\Models\Activity::latest()->limit(10)->get();
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
        @foreach($headerCarousels as $index => $headerCarousel)
            <!-- Carousel Text -->
            <div class="absolute inset-0 flex justify-center items-center text-center transition-opacity duration-500"
                 data-index="{{ $index }}"
                 style="opacity: {{ $index === 0 ? '1' : '0' }};">
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
                class="flex flex-col items-center justify-center w-20  h-20  bg-green-600 rounded-2xl text-green-600 shadow hover:shadow-md cursor-pointer mb-2 p-1 transition ease-in duration-300">
                <!-- Recharge Link -->
                <a href="#" onclick="openModal(event)" class="text-sm font-extrabold text-white mt-1">
                    <p>Recharge</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6 text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                    </svg>
                </a>

                <!-- Modal Structure -->
                <div id="modal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-2xl relative">
                        <!-- Close Button -->
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 absolute top-3 right-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Modal Content Container with Scrolling -->
                        <div class="overflow-y-auto max-h-[75vh] p-4">
                            <!-- TRC20 Address Iframe -->
                            <iframe id="trc20Iframe" src="" class="w-full h-96 border-0"></iframe>

                            <!-- Deposit Instructions -->
                            <div class="mt-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg text-gray-800 dark:text-gray-200">
                                <h3 class="text-lg font-semibold mb-2">Deposit Instructions</h3>
                                <p>Please send the required amount of USDT to the TRC20 address shown above. Ensure you are using a compatible wallet, and double-check the address before proceeding with the transfer.</p>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6 text-white" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                    </svg>
                </a>
            </div>
            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-amber-800 rounded-2xl text-amber-600  shadow hover:shadow-md cursor-pointer mb-2 p-1 transition ease-in duration-300">
                <a href="{{ auth()->check() ? route('cust-withdraw') : route('login') }}">
                    <p class="text-sm font-extrabold text-white mt-1">Application</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6 text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0m-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
                    </svg>
                </a>
            </div>
            <div
                class="flex flex-col items-center justify-center w-20  h-20  bg-indigo-200  rounded-2xl  text-indigo-500 shadow hover:shadow-md cursor-pointer mb-2 p-1 bg-white transition ease-in duration-300">
                <i class="far fa-mountains"></i>
                <p class="text-sm font-extrabold mt-1">Our Company</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6" viewBox="0 0 16 16">
                    <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z"/>
                </svg>
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
            <button onclick="addDeposit()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">
                Add Deposit
            </button>
        </div>

        <h4 class="font-semibold">Regulated By</h4>
        <div class="grid grid-cols-1">
            @foreach($regulators as $regulator)
                <div class="mt-4">
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
            { name: 'John Doe', amount: '$150', time: '2 minutes ago' },
            { name: 'Jane Smith', amount: '$200', time: '5 minutes ago' },
            { name: 'Alice Johnson', amount: '$350', time: '10 minutes ago' },
            { name: 'Bob Brown', amount: '$50', time: '15 minutes ago' },
            { name: 'Charlie Davis', amount: '$100', time: '20 minutes ago' }
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
</x-app-layout>
