<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'System Administration') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <livewire:layout.navigation/>

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

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
    @if(session('deleted'))
        <div x-data="{ open: true }" x-show="open"
             class="fixed top-4 right-4 z-50 flex bg-red-100 max-w-sm rounded-lg shadow-md p-4">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center w-full">
                    <div class="w-16 bg-red-500 p-4 rounded-l-lg">
                        <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M256 0C114.615 0 0 114.617 0 256s114.615 256 256 256 256-114.617 256-256S397.385 0 256 0zm0 482C126.393 482 30 385.607 30 256S126.393 30 256 30s226 96.393 226 226-96.393 226-226 226zm104-290H152c-11.046 0-20 8.954-20 20s8.954 20 20 20h208c11.046 0 20-8.954 20-20s-8.954-20-20-20zm-104 164c-11.046 0-20 8.954-20 20s8.954 20 20 20h.02c11.046 0 19.98-8.954 19.98-20s-8.934-20-20-20z"/>
                        </svg>
                    </div>
                    <div class="w-auto text-gray-800 items-center p-4">
                        <span class="text-lg font-bold pb-4">Deleted!</span>
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

    <!-- Page Content -->
    <div class="relative min-h-screen flex flex-col justify-between">
        <div class="bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600 h-screen flex overflow-hidden text-sm">
            <div
                class="bg-white dark:bg-gray-900 dark:border-gray-800 w-20 flex-shrink-0 border-r border-gray-200 flex-col hidden sm:flex">
                <div class="h-16 text-blue-500 flex items-center justify-center">
                    <svg class="w-9" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 54 33">
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M27 0c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.054.513 3.522 2.004 5.147 3.653C30.744 13.09 33.808 16.2 40.5 16.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C36.756 3.11 33.692 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 29.29 20.308 32.4 27 32.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C23.256 19.31 20.192 16.2 13.5 16.2z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="flex mx-auto flex-grow mt-4 flex-col text-gray-400 space-y-4">
                    <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
                        <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </button>
                    <button
                        class="h-10 w-12 dark:bg-gray-700 dark:text-white rounded-md flex items-center justify-center bg-blue-100 text-blue-500">
                        <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                    </button>
                    <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
                        <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                            <line x1="12" y1="11" x2="12" y2="17"></line>
                            <line x1="9" y1="14" x2="15" y2="14"></line>
                        </svg>
                    </button>
                    <button class="h-10 w-12 dark:text-gray-500 rounded-md flex items-center justify-center">
                        <svg viewBox="0 0 24 24" class="h-5" stroke="currentColor" stroke-width="2" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex-grow overflow-hidden h-full flex flex-col">
                <div class="h-16 lg:flex w-full border-b border-gray-200 dark:border-gray-800 hidden px-10">
                    <div class="flex h-full text-gray-600 dark:text-gray-400">
                        <a href="#"
                           class="cursor-pointer h-full border-b-2 {{ Request::is('/') ? 'border-blue-500 text-blue-500 dark:text-white dark:border-white' : 'border-transparent' }} inline-flex items-center mr-8">Company Name</a>

                        <a href="{{ route('app-index') }}"
                           class="cursor-pointer h-full border-b-2 {{ Request::is('app-index') ? 'border-blue-500 text-blue-500 dark:text-white dark:border-white' : 'border-transparent' }} inline-flex mr-8 items-center">Admin Home</a>

                        <a href="{{ route('app-dashboard') }}"
                           class="cursor-pointer h-full border-b-2 {{ Request::is('app-dashboard') ? 'border-blue-500 text-blue-500 dark:text-white dark:border-white' : 'border-transparent' }} inline-flex items-center mr-8">Admin Dashboard</a>

                        <a href="{{ route('dashboard') }}"
                           class="cursor-pointer h-full border-b-2 {{ Request::is('dashboard') ? 'border-blue-500 text-blue-500 dark:text-white dark:border-white' : 'border-transparent' }} inline-flex items-center mr-8">Application</a>
                    </div>
                    <div class="ml-auto flex items-center space-x-7">
                        <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500">Deposit</button>
                    </div>
                </div>
                <div class="flex-grow flex overflow-x-hidden">
                    <div
                        class="xl:w-72 w-48 flex-shrink-0 border-r border-gray-200 dark:border-gray-800 h-full overflow-y-auto lg:block hidden p-5">
                        <div class="space-y-4 mt-3">
                            <div class="min-h-screen flex flex-row bg-gray-100">
                                <div class="flex flex-col w-56 bg-white rounded-r-3xl overflow-hidden">
                                    <div class="flex items-center justify-center h-20 shadow-md">
                                        <h1 class="text-3xl uppercase text-indigo-500">Logo</h1>
                                    </div>
                                    <ul class="flex flex-col py-4">
                                        <li>
                                            <a href="{{ route('app-index') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-home"></i></span>
                                                <span class="text-sm font-medium">Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('access-control') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-lock-alt"></i></span>
                                                <span class="text-sm font-medium">Access Control</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-drink"></i></span>
                                                <span class="text-sm font-medium">System Pages</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cms') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-shopping-bag"></i></span>
                                                <span class="text-sm font-medium">CMS</span>
                                            </a>
                                        </li>
{{--                                        <li>--}}
{{--                                            <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">--}}
{{--                                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-chat"></i></span>--}}
{{--                                                <span class="text-sm font-medium">Chat</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">--}}
{{--                                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-user"></i></span>--}}
{{--                                                <span class="text-sm font-medium">Profile</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">--}}
{{--                                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-bell"></i></span>--}}
{{--                                                <span class="text-sm font-medium">Notifications</span>--}}
{{--                                                <span class="ml-auto mr-6 text-sm bg-red-100 rounded-full px-3 py-px text-red-500">5</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">--}}
{{--                                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-log-out"></i></span>--}}
{{--                                                <span class="text-sm font-medium">Logout</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
                        <div
                            class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
                            <div class="flex w-full items-center">
                                <div class="flex items-center text-3xl text-gray-900 dark:text-white">
                                    <img
                                        src="https://assets.codepen.io/344846/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1582611188&width=512"
                                        class="w-12 mr-4 rounded-full" alt="profile"/>
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="ml-auto sm:flex hidden items-center justify-end">
                                    <div class="text-right">
                                        <div class="text-xs text-gray-400 dark:text-gray-400">Account balance:</div>
                                        <div class="text-gray-900 text-lg dark:text-white">$2,794.00</div>
                                    </div>
                                    <button
                                        class="w-8 h-8 ml-4 text-gray-400 shadow dark:text-gray-400 rounded-full flex items-center justify-center border border-gray-200 dark:border-gray-700">
                                        <svg viewBox="0 0 24 24" class="w-4" stroke="currentColor" stroke-width="2"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 sm:mt-7 mt-4">
                                <a href="#"
                                   class="px-3 border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white pb-1.5">Activities</a>
                                <a href="#"
                                   class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5">Transfer</a>
                                <a href="#"
                                   class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5 sm:block hidden">Budgets</a>
                                <a href="#"
                                   class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5 sm:block hidden">Notifications</a>
                                <a href="#"
                                   class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5 sm:block hidden">Cards</a>
                            </div>
                        </div>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Fixed Button Section -->
{{--        <footer class="sticky bottom-0 left-0 right-0 bg-gray-800 text-white z-50">--}}
{{--            <div--}}
{{--                class="p-5 px-6 m-2 flex items-center justify-between bg-gray-900 shadow-3xl text-gray-400 rounded-2xl cursor-pointer">--}}
{{--                <p>footer text</p>--}}
{{--            </div>--}}
{{--        </footer>--}}
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
