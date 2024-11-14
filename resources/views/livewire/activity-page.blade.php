<div>
    <div class="overflow-hidden bg-gray-900">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="flex flex-col items-center justify-between xl:flex-row">
                <div class="w-full max-w-xl mb-12 xl:pr-16 xl:mb-0 xl:w-7/12">
                    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                        The quick, brown fox <br class="hidden md:block" />
                        jumps over a <span class="text-teal-accent-400">lazy dog</span>
                    </h2>
                    <p class="max-w-xl mb-4 text-base text-gray-400 md:text-lg">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudan, totam rem aperiam, eaque ipsa quae.
                    </p>
                    <a href="/" aria-label="" class="inline-flex items-center font-semibold tracking-wider transition-colors duration-200 text-teal-accent-400 hover:text-teal-accent-700">
                        Learn more
                        <svg class="inline-block w-3 ml-2" fill="currentColor" viewBox="0 0 12 12">
                            <path d="M9.707,5.293l-5-5A1,1,0,0,0,3.293,1.707L7.586,6,3.293,10.293a1,1,0,1,0,1.414,1.414l5-5A1,1,0,0,0,9.707,5.293Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="w-full max-w-xl xl:px-8 xl:w-5/12">
                    <div class="relative">
                        <svg viewBox="0 0 52 24" fill="currentColor" class="absolute bottom-0 right-0 z-0 hidden w-32 -mb-8 -mr-20 text-teal-accent-400 lg:w-32 lg:-mr-16 sm:block">
                            <defs>
                                <pattern id="766323e1-e594-4ffd-a688-e7275079d540" x="0" y="0" width=".135" height=".30">
                                    <circle cx="1" cy="1" r=".7"></circle>
                                </pattern>
                            </defs>
                            <rect fill="url(#766323e1-e594-4ffd-a688-e7275079d540)" width="52" height="24"></rect>
                        </svg>
                        <div class="relative bg-white rounded shadow-2xl p-7 sm:p-10">
                            <h3 class="mb-4 text-xl font-semibold sm:text-center sm:mb-6 sm:text-2xl">
                                Sign up for updates
                            </h3>
                            <form>
                                <div class="mb-1 sm:mb-2">
                                    <label for="name" class="inline-block mb-1 font-medium">Name</label>
                                    <input
                                        placeholder="John Doe"
                                        required=""
                                        type="text"
                                        class="flex-grow w-full h-12 px-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
                                        id="name"
                                        name="name"
                                    />
                                </div>
                                <div class="mb-1 sm:mb-2">
                                    <label for="email" class="inline-block mb-1 font-medium">E-mail</label>
                                    <input
                                        placeholder="john.doe@example.org"
                                        required=""
                                        type="text"
                                        class="flex-grow w-full h-12 px-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
                                        id="email"
                                        name="email"
                                    />
                                </div>
                                <div class="mt-4 mb-2 sm:mb-4">
                                    <button
                                        type="submit"
                                        class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                    >
                                        Subscribe
                                    </button>
                                </div>
                                <p class="text-xs text-gray-600 sm:text-sm">
                                    We respect your privacy. Unsubscribe at any time.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-5">
        <button class="tab-button text-white p-4 rounded bg-indigo-500 shadow-md flex items-center justify-center active" data-tab="in-progress">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            In Progress
        </button>
        <button class="tab-button p-4 rounded bg-white text-indigo-500 shadow-md flex items-center justify-center" data-tab="completed">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Completed
        </button>
        <button class="tab-button p-4 rounded bg-white text-indigo-500 shadow-md flex items-center justify-center" data-tab="settings">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 a=02 a=02 -00 -00 -00 -00 -00 -00 -00 -00"/>
            </svg>
            Settings
        </button>
    </div>

    <div class="shadow-xl border border-gray-100 font-light p-8 rounded text-gray-500 bg-white mt-6">
        <div id="in-progress" class="tab-content active">
            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.
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
</div>
