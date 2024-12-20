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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
{{--    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #google_translate_element .goog-logo-link {
            display: none !important;
        }

        #google_translate_element .goog-te-gadget {
            font-size: 0px;
        }

        #google_translate_element .goog-te-gadget span {
            display: none;
        }
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-green-300 dark:bg-gray-900">
    <!-- Page Content -->
    <div class="relative min-h-screen flex flex-col justify-between">
        <nav class="px-8 pt-2 shadow-md sticky top-0 z-50">
            <div class="flex justify-between items-center">
                <img src="{{ asset('img/logo.png') }}" class="h-12 w-12">

                <!-- Google Translate Dropdown (For Larger Screens) -->
                <div id="google_translate_element"></div>
            </div>
        </nav>
        <!-- Main Content -->
        <main class="flex-grow py-4 px-6">
            {{ $slot }}
        </main>

{{--        <div id="app" class="bg-gray-100 overflow-hidden">--}}
{{--            <!-- Modal trigger -->--}}
{{--            <button--}}
{{--                @click="showModal = !showModal"--}}
{{--                class="fixed bottom-32 right-5 bg-indigo-500 hover:bg-indigo-600 focus:outline-none rounded-md px-6 py-3 text-white transition duration-500 ease-in-out">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6" viewBox="0 0 16 16">--}}
{{--                    <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5" />--}}
{{--                </svg>--}}
{{--                <span class="animate-ping absolute inline-flex h-full w-full rounded-full border-4 opacity-50"></span>--}}
{{--            </button>--}}
{{--            <!-- ./Modal trigger -->--}}

{{--            <transition name="custom" enter-active-class="animate__animated animate__bounceInDown" leave-active-class="animate__animated animate__bounceOutUp">--}}
{{--                <!-- Modal -->--}}
{{--                <div v-if="showModal" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50">--}}
{{--                    <div class="w-11/12 lg:w-full max-w-xl mx-auto bg-white shadow-2xl rounded-md overflow-hidden">--}}

{{--                        <!-- Modal Header -->--}}
{{--                        <div class="p-6 border-b-4 border-gray-200 text-lg font-bold text-indigo-400 text-center">--}}
{{--                            Online Service--}}
{{--                        </div>--}}

{{--                        <!-- Modal Content -->--}}
{{--                        <div class="p-6 text-center">--}}
{{--                            <div class="text-lg font-semibold mb-4">--}}
{{--                                Choose your preferred online customer service contact method--}}
{{--                            </div>--}}

{{--                            <!-- Option 1: Telegram Chat -->--}}
{{--                            <div class="flex items-center justify-between w-full p-3 mb-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">--}}
{{--                                <span>PlanUSDT Customer Service</span>--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">--}}
{{--                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09"/>--}}
{{--                                </svg>--}}
{{--                            </div>--}}

{{--                            <!-- Option 2: Chat in App -->--}}
{{--                            <button class="w-full p-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">--}}
{{--                                Chat in the App--}}
{{--                            </button>--}}
{{--                            <form>--}}

{{--                            </form>--}}
{{--                        </div>--}}

{{--                        <!-- Modal Footer -->--}}
{{--                        <div class="border-t-4 border-gray-200 p-6 flex justify-end">--}}
{{--                            <button @click="showModal = false" class="bg-green-400 hover:bg-green-500 focus:outline-none transition px-4 py-2 rounded-md text-white duration-500 ease-in-out">--}}
{{--                                Close--}}
{{--                            </button>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- ./Modal -->--}}
{{--            </transition>--}}

{{--            <transition name="custom" enter-active-class="animate__animated animate__fadeIn" leave-active-class="animate__animated animate__fadeOut">--}}
{{--                <!-- Overlay -->--}}
{{--                <div v-if="showModal" class="bg-gray-700 bg-opacity-50 fixed inset-0 transition duration-500 ease-in-out z-30"></div>--}}
{{--                <!-- ./Overlay -->--}}
{{--            </transition>--}}
{{--        </div>--}}


        <!-- Fixed Buttons Section -->
        <footer class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white z-50">
            <div
                class="p-4 flex items-center justify-between bg-gray-900 shadow-md text-gray-400 rounded-t-lg"
                style="touch-action: manipulation;"
            >
                <!-- Home -->
                <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400">
                    <a href="{{ auth()->check() ? route('dashboard') : route('welcome') }}" class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                        </svg>
                        <span class="text-xs mt-1">Home</span>
                    </a>
                </div>
                <!-- Activity -->
                <a href="{{ auth()->check() ? route('activities') : route('login') }}">
                    <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2"/>
                        </svg>
                        <span class="text-xs">Activity</span>
                    </div>
                </a>
                <!-- Team -->
                <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400">
                    <a href="{{ auth()->check() ? route('cust-team') : route('login') }}" class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zM7.022 13H7V12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        </svg>
                        <span class="text-xs mt-1">Team</span>
                    </a>
                </div>
                <!-- Pro -->
                <a href="{{ auth()->check() ? route('pro-activities') : route('login') }}">
                    <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4" viewBox="0 0 16 16">
                            <path d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6zm11.386 3.785-1.806-2.41-.776 2.413zm-3.633.004.961-2.989H4.186l.963 2.995zM5.47 5.495 8 13.366l2.532-7.876zm-1.371-.999-.78-2.422-1.818 2.425zM1.499 5.5l5.113 6.817-2.192-6.82zm7.889 6.817 5.123-6.83-2.928.002z"/>
                        </svg>
                        <span class="text-xs">Pro</span>
                    </div>
                </a>
                <!-- Account -->
                <div class="flex flex-col items-center transition ease-in duration-200 hover:text-blue-400">
                    <a href="{{ auth()->check() ? route('account-profile') : route('login') }}" class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span class="text-xs mt-1">Account</span>
                    </a>
                </div>
            </div>
        </footer>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data() {
            return{
                showModal: false,
            }
        }
    })
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
