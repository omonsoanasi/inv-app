<div>
    <div class="flex flex-wrap -mx-2">
        {{-- div for Header Carousel --}}
        <div class="w-full sm:w-1/2 px-2 mt-4">
            <div
                class="p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Header Carousel Items</h5>
                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                    @foreach($headerCarousels as $headerCarousel)
                        <li class="flex mb-2 items-center justify-between bg-gray-100 dark:bg-gray-800 rounded-lg p-4 shadow hover:shadow-lg transition-shadow">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 me-3 text-green-500 dark:text-green-400 flex-shrink-0"
                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span
                                    class="text-gray-800 dark:text-gray-200 font-medium">{{ $headerCarousel->header_carousel_text }}</span>
                            </div>
                            <button
                                wire:click="deleteHeaderCarouselText({{ $headerCarousel->id }})"
                                wire:confirm="Are you sure you want to remove this item?"
                                type="button"
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 transition-colors dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                Remove
                            </button>
                        </li>
                    @endforeach
                </ul>
                {{ $headerCarousels->links() }}
                <div>
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                        Add Item
                    </button>

                    <!-- Main modal -->
                    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Add list item to be shown in the header carousel
                                    </h3>
                                    <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form wire:submit="saveHeaderCarousel" class="space-y-4">
                                        <div>
                                            <label for="email"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                text</label>
                                            <input wire:model="headerCarouselText" type="text" id="headerCarouselText"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="Welcome to our website" required/>
                                        </div>
                                        <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- div for Hero Section --}}
        <div class="w-full sm:w-1/2 px-2 mt-4">
            <div
                class="p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Hero Section</h5>
                <p>{{ $heroSection->title ?? 'Not set' }}</p>
                <p>{{ $heroSection->text ?? 'Not set' }}</p>
                <p>{{ $heroSection->call_to_action ?? 'Not set' }}</p>
                <div>
                    <!-- Modal toggle -->
                    <button data-modal-target="hero-section-modal" data-modal-toggle="hero-section-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                        Edit Hero Section
                    </button>

                    <!-- Main modal -->
                    <div id="hero-section-modal" tabindex="-1" aria-hidden="true"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Edit Hero Section
                                    </h3>
                                    <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="hero-section-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form wire:submit="saveHeroSection" class="space-y-4">
                                        <div>
                                            <label for="title"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hero
                                                Section Title</label>
                                            <input wire:model="title" type="text" id="title"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="Premium Investment" required/>
                                        </div>
                                        <div>
                                            <label for="text"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hero
                                                Section Text</label>
                                            <input wire:model="text" type="text" id="headerCarouselText"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="We Invest" required/>
                                        </div>
                                        <div>
                                            <label for="callToAction"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Call
                                                to Action</label>
                                            <input wire:model="callToAction" type="text" id="callToAction"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="Get Started" required/>
                                        </div>
                                        <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap -mx-2">
        {{-- div for Header Carousel --}}
        <div class="w-full sm:w-1/2 px-2 mt-4">
            <div
                class="p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Activities</h5>
                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                    @foreach($activities as $activity)
                        <li class="flex mb-2 items-center justify-between bg-gray-100 dark:bg-gray-800 rounded-lg p-4 shadow hover:shadow-lg transition-shadow">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 me-3 text-green-500 dark:text-green-400 flex-shrink-0"
                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="text-gray-800 dark:text-gray-200 font-medium">{{ $activity->activity_name }} : {{ $activity->activity_commission }}</span>
                            </div>
                            <button
                                wire:click="deleteActivity({{ $activity->id }})"
                                wire:confirm="Are you sure you want to remove this item?"
                                type="button"
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 transition-colors dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                Remove
                            </button>
                        </li>
                    @endforeach
                </ul>
                {{ $activities->links() }}
                <div>
                    <!-- Modal toggle -->
                    <button data-modal-target="activity-modal" data-modal-toggle="activity-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                        Add Activity
                    </button>

                    <!-- Main modal -->
                    <div id="activity-modal" tabindex="-1" aria-hidden="true"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Add Activity
                                    </h3>
                                    <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="activity-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form wire:submit="saveActivity" type="multipart/enctype" class="space-y-4">
                                        <div>
                                            <label for="name"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activity
                                                Name</label>
                                            <input wire:model="activity_name" type="text" id="name"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="VIP-1" required/>
                                        </div>
                                        <div>
                                            <label for="commission"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Commission</label>
                                            <input wire:model="activity_commission" type="number" id="commission"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="10" required/>
                                        </div>
                                        <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- div for Regulated Section --}}
        <div class="w-full sm:w-1/2 px-2 mt-4">
            <div
                class="p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Regulated By</h5>
                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                    @foreach($regulatedBies as $regulatedBy)
                        <li class="flex mb-2 items-center justify-between bg-gray-100 dark:bg-gray-800 rounded-lg p-4 shadow hover:shadow-lg transition-shadow">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 me-3 text-green-500 dark:text-green-400 flex-shrink-0"
                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span
                                    class="text-gray-800 dark:text-gray-200 font-medium">{{ $regulatedBy->regulator_name }} - {{ $regulatedBy->getFirstMediaUrl('regulator_image') }}</span>
                            </div>
                            <button
                                wire:click="deleteRegulator({{ $regulatedBy->id }})"
                                wire:confirm="Are you sure you want to remove this item?"
                                type="button"
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 transition-colors dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                Remove
                            </button>
                        </li>
                    @endforeach
                </ul>
                {{ $regulatedBies->links() }}
                <div>
                    <!-- Modal toggle -->
                    <button data-modal-target="regulated-section-modal" data-modal-toggle="regulated-section-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                        Add regulator
                    </button>

                    <!-- Main modal -->
                    <div id="regulated-section-modal" tabindex="-1" aria-hidden="true"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Add Section
                                    </h3>
                                    <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="regulated-section-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form wire:submit="saveRegulationInformation" class="space-y-4" enctype="multipart/form-data">
                                        <div>
                                            <label for="regulator_name"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Regulator
                                                Name</label>
                                            <input wire:model="regulator_name" type="text" id="regulator_name"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="USA Dept" required/>
                                        </div>

{{--                                        <div>--}}
{{--                                            <label for="regulator_image"--}}
{{--                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Regulator File</label>--}}
{{--                                            <input wire:model="regulator_image" type="file" id="eventImages"--}}
{{--                                                   class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-200">--}}
{{--                                        </div>--}}

                                        <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full sm:w-1/2 px-2 mt-4">
            <div
                class="p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">How To Section</h5>
                <p>{{ $howTo->how_title ?? 'not set' }}</p>
                <p>{{ $howTo->how_text ?? 'not set' }}</p>
                <p>{{ $howTo->how_call_to_action ?? 'not set' }}</p>
                <div>
                    <!-- Modal toggle -->
                    <button data-modal-target="how-section-modal" data-modal-toggle="how-section-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                        Edit How To Section
                    </button>

                    <!-- Main modal -->
                    <div id="how-section-modal" tabindex="-1" aria-hidden="true"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Edit How To Section
                                    </h3>
                                    <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="how-section-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form wire:submit="saveHowSection" class="space-y-4">
                                        <div>
                                            <label for="how_title"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How To Title</label>
                                            <input wire:model="how_title" type="text" id="title"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="Premium Investment" required/>
                                        </div>
                                        <div>
                                            <label for="text"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How To Text</label>
                                            <input wire:model="how_text" type="text" id="headerCarouselText"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="We Invest" required/>
                                        </div>
                                        <div>
                                            <label for="callToAction"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Call
                                                to Action</label>
                                            <input wire:model="how_callToAction" type="text" id="callToAction"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   placeholder="Get Started" required/>
                                        </div>
                                        <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
