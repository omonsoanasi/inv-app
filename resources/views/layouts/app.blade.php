<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <div class="relative min-h-screen flex flex-col justify-between">

                <!-- Header Section (Optional) -->
{{--                <header class="py-4 text-center bg-gray-800 text-white">--}}
{{--                    <h1 class="text-2xl font-bold">Dashboard</h1>--}}
{{--                </header>--}}

                <!-- Main Content -->
                <main class="flex-grow py-4 px-6">
                {{ $slot }}
                </main>

                <div x-data="{ showModal: false }" class="flex flex-col items-center hover:text-blue-400">
                    <!-- Button to trigger the modal -->
                    <div x-data="{ showModal: false }">
                        <!-- Modal Button -->
                        <div
                            @click="showModal = true"
                            class="fixed bottom-20 right-5 shadow-2xl text-center flex items-center justify-center rounded-full border-4 text-xl border-gray-50 hover:border-blue-500 bg-blue-500 w-10 h-10 p-2 text-white transition ease-in duration-200 cursor-pointer"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6" viewBox="0 0 16 16">
                                <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5" />
                            </svg>
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full border-4 opacity-50"></span>
                        </div>

                    <!-- Modal -->
                    <div
                        x-show="showModal"
                        x-transition
                        @click.away="showModal = false"
                        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50"
                    >
                        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/3 p-6 relative max-h-screen overflow-y-auto">
                            <!-- Close 'X' button -->
                            <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <!-- Modal Content -->
                            <h2 class="text-xl font-semibold text-gray-800">This is a modal</h2>

                            <!-- Component Start -->
                            <div class="flex flex-col w-full max-w-xl bg-white shadow-xl rounded-lg overflow-hidden">
                                <div class="flex flex-col h-[60vh] p-4 overflow-y-auto">
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                        <div>
                                            <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                    </div>
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                                        <div>
                                            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                    </div>
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                                        <div>
                                            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit amet.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                    </div>
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                        <div>
                                            <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                    </div>
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                                        <div>
                                            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                    </div>
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                                        <div>
                                            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                    </div>
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                                        <div>
                                            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit amet.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                    </div>
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                        <div>
                                            <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                    </div>
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                                        <div>
                                            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                                                <p class="text-sm">Lorem ipsum dolor sit.</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                                        </div>
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                                    </div>
                                </div>

                                <div class="bg-gray-300 p-4">
                                    <input class="flex items-center h-10 w-full rounded px-3 text-sm" type="text" placeholder="Type your message…">
                                </div>
                            </div>
                            <!-- Component End  -->

                            <!-- Close button -->
                            <button @click="showModal = false" class="mt-6 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Close</button>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Fixed Button Section -->
                <footer class="sticky bottom-0 left-0 right-0 bg-gray-800 text-white z-50">
                    <div class="p-5 px-6 m-2 flex items-center justify-between bg-gray-900 shadow-3xl text-gray-400 rounded-2xl cursor-pointer">
                        <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400 ">
                            <a href="{{ auth()->check() ? route('dashboard') : route('welcome') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                </svg>
                                <span class="text-xs">Home</span>
                            </a>
                        </div>
                        <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2"/>
                            </svg>
                            <span class="text-xs">Activity</span>
                        </div>
                        <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400 ">
                            <a href="{{ auth()->check() ? route('cust-team') : route('login') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                </svg>
                                <span class="text-xs">Team</span>
                            </a>
                        </div>

                        <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4" viewBox="0 0 16 16">
                                <path d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6zm11.386 3.785-1.806-2.41-.776 2.413zm-3.633.004.961-2.989H4.186l.963 2.995zM5.47 5.495 8 13.366l2.532-7.876zm-1.371-.999-.78-2.422-1.818 2.425zM1.499 5.5l5.113 6.817-2.192-6.82zm7.889 6.817 5.123-6.83-2.928.002z"/>
                            </svg>
                            <span class="text-xs">Pro</span>
                        </div>
                        <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400 ">
                            <a href="{{ auth()->check() ? route('account-profile') : route('login') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <span class="text-xs">Account</span>
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
