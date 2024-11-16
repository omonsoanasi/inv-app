@php
    use App\Models\AccountBalance;
    $accountBalance = AccountBalance::where('activity_id', $this->activity->id)->where('user_id', $this->user_id)->latest()->first();
@endphp
<div>
    <div class="overflow-hidden bg-green-900">
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
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="flex flex-col items-center justify-between xl:flex-row">
                <div class="w-full mb-12 xl:pr-16 xl:mb-0">
                    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                        <span class="text-teal-accent-400">PlanUSDT</span>
                    </h2>
                    <div class="p-4 flex justify-center items-center flex-wrap">
                        <!-- Today's Tasks -->
                        <span
                            class="inline-flex items-center m-2 px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded-full text-sm font-semibold text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 fill-current"
                                 viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/>
                                <path
                                    d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/>
                                <path fill-rule="evenodd"
                                      d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/>
                            </svg>
                            <span class="ml-1">Today's Tasks : {{ $activity->daily_tasks }}</span>
                        </span>

                        <!-- Task Reset Timer -->
                        <span
                            class="inline-flex items-center m-2 px-3 py-1 bg-green-200 hover:bg-green-300 rounded-full text-sm font-semibold text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4 fill-current"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z"/>
                                <path
                                    d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1"/>
                            </svg>
                            <span class="ml-1">
                                Task resets in:
                            <span id="countdown"
                                  data-task-reset-time="{{ $accountBalance && $accountBalance->task_reset_time ? $accountBalance->task_reset_time->toIso8601String() : '' }}">
                                {{ $accountBalance && $accountBalance->task_reset_time ? 'Calculating...' : 'No reset time available' }}
                            </span>

                            </span>
                        </span>

                        <!-- Remaining Tasks -->
                        <span
                            class="inline-flex items-center m-2 px-3 py-1 bg-blue-200 hover:bg-blue-300 rounded-full text-sm font-semibold text-blue-600">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/><path
                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                            </svg>
                            <span class="ml-1">Today's remaining tasks:</span>
                        </span>

                        <!-- Buttons Section -->
                        <div class="w-full mt-4 flex justify-center space-x-4">

                            <!-- Information label -->
                            <div
                                class="flex items-center rounded-full py-1 px-4 font-medium border text-green-900 bg-green-100 border-green-300">
                                Order Commission :
                                <span class="flex items-center ml-2 font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5 mr-1"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                                    </svg>
                                    {{ number_format($activity->activity_commission,2) }}
                                </span>
                            </div>
                            <button wire:click="completeTask"
                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded">
                                Complete Task
                            </button>
                            {{--                            <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded">--}}
                            {{--                                Reset Task--}}
                            {{--                            </button>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-5">
        <button
            class="tab-button text-white p-4 rounded bg-indigo-500 shadow-md flex items-center justify-center active"
            data-tab="in-progress">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            In Progress
        </button>
        <button class="tab-button p-4 rounded bg-white text-indigo-500 shadow-md flex items-center justify-center"
                data-tab="completed">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Completed
        </button>
        <button class="tab-button p-4 rounded bg-white text-indigo-500 shadow-md flex items-center justify-center"
                data-tab="settings">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 8h2a2 a=02 a=02 -00 -00 -00 -00 -00 -00 -00 -00"/>
            </svg>
            Settings
        </button>
    </div>

    <div class="shadow-xl border border-gray-100 font-light p-8 rounded text-gray-500 bg-white mt-6">
        <div id="in-progress" class="tab-content active">
            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth
            master cleanse.
        </div>
        <div id="completed" class="tab-content hidden">
            Mustache cliche tempor, williamsburg carles vegan helvetica.
        </div>
        <div id="settings" class="tab-content hidden">

        </div>
    </div>

    <script>
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.getAttribute('data-tab');

                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.classList.replace('bg-indigo-500', 'bg-white');
                    btn.classList.replace('text-white', 'text-indigo-500');
                });
                tabContents.forEach(content => content.classList.add('hidden'));

                // Add active class to clicked button and corresponding content
                button.classList.add('active');
                button.classList.replace('bg-white', 'bg-indigo-500');
                button.classList.replace('text-indigo-500', 'text-white');
                document.getElementById(targetTab).classList.remove('hidden');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const countdownElement = document.getElementById('countdown');
            const resetTime = new Date(countdownElement.dataset.taskResetTime).getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const timeDifference = resetTime - now;

                if (timeDifference <= 0) {
                    countdownElement.textContent = "Task reset time reached!";
                    return;
                }

                const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                countdownElement.textContent = `${hours}h ${minutes}m ${seconds}s`;
            }

            // Update countdown every second
            setInterval(updateCountdown, 1000);

            // Initialize countdown on page load
            updateCountdown();
        });
    </script>
</div>
