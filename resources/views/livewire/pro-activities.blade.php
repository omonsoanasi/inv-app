<div>
    @foreach($proActivities as $proActivity)
        @if(auth()->check() && (auth()->user()->accountBalance?->total_amount) < 10)
            <button onclick="showUpgradeAlert()" class="w-full h-full">
                <div class="flex p-2 bg-white shadow-lg rounded-lg mt-5">
                    <img class="h-20 w-20 rounded-lg self-center" src="{{ asset('img/symbol.png') }}" alt="food">
                    <div class="p-2 pl-3 w-full">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold inline-block">{{ $proActivity->activity_name }}</h3>
                            <svg class="h-5 w-5 inline-block text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                 width="32" height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                        <div class="flex items-center">
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <span class="pl-2">5</span>
                        </div>
                        <div class="text-gray-500 flex items-center justify-between">
                            <svg class="inline-block h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="10" cy="20.5" r="1"/>
                                <circle cx="18" cy="20.5" r="1"/>
                                <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/>
                            </svg>
                            <span class="text-sm ml-2">{{ $proActivity->daily_tasks }} Tasks/Day</span>
                            <span
                                class="ml-auto text-orange-500 font-bold">$ {{ number_format($proActivity->activity_commission,2) }}</span>
                        </div>
                    </div>
                </div>
            </button>
        @else
            <a href="{{ route('activity-page', $proActivity->id) }}">
                <div class="flex p-2 bg-white shadow-lg rounded-lg mt-5">
                    <img class="h-20 w-20 rounded-lg self-center" src="{{ asset('img/symbol.png') }}" alt="food">
                    <div class="p-2 pl-3 w-full">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold inline-block">{{ $proActivity->activity_name }}</h3>
                            <svg class="h-5 w-5 inline-block text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                 width="32" height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                        <div class="flex items-center">
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <svg class="h-4 w-4 text-red-400 inline-block" xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            <span class="pl-2">5</span>
                        </div>
                        <div class="text-gray-500 flex items-center justify-between">
                            <svg class="inline-block h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="10" cy="20.5" r="1"/>
                                <circle cx="18" cy="20.5" r="1"/>
                                <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/>
                            </svg>
                            <span class="text-sm ml-2">{{ $proActivity->daily_tasks }} Tasks/Day</span>
                            <span
                                class="ml-auto text-orange-500 font-bold">$ {{ number_format($proActivity->activity_commission,2) }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endif
    @endforeach
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showUpgradeAlert() {
        Swal.fire({
            title: 'Upgrade Required',
            text: 'Recharge your account to use this activity.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    }
</script>
