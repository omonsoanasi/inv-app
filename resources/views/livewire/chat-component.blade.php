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
                <h2 class="text-xl font-semibold text-gray-800">Talk with us</h2>

                <!-- Component Start -->
                <div class="flex flex-col w-full max-w-xl bg-white shadow-xl rounded-lg overflow-hidden">
                    <div class="flex flex-col h-[60vh] p-4 overflow-y-auto">
                        <div class="bg-gray-100 p-4 h-screen overflow-y-auto">
                            <div class="bg-gray-100 h-screen flex flex-col relative">
                                <!-- Chat messages container -->
                                <div class="flex-1 overflow-y-auto p-4">
                                    @foreach($chats as $chat)
                                        <div class="mb-4">
                                            <!-- User Message -->
                                            @if($chat->user_id === auth()->id())
                                                <div class="flex justify-start">
                                                    <div class="bg-green-500 text-white py-2 px-4 rounded-lg max-w-sm">
                                                        {{ $chat->message }}
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Admin Response -->
                                            @if($chat->admin_response)
                                                <div class="flex justify-end mt-2">
                                                    <div class="bg-gray-300 text-gray-900 py-2 px-4 rounded-lg max-w-sm">
                                                        {{ $chat->admin_response }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

{{--                                <!-- Fixed Input Section -->--}}
{{--                                <form wire:submit.prevent="sendMessage" class="absolute bottom-0 left-0 w-full bg-white border-t border-gray-300 p-4 flex">--}}
{{--                                    <input--}}
{{--                                        type="text"--}}
{{--                                        wire:model="message"--}}
{{--                                        class="flex-1 border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-green-300"--}}
{{--                                        placeholder="Type a message..."--}}
{{--                                    />--}}
{{--                                    <button--}}
{{--                                        type="submit"--}}
{{--                                        class="ml-2 bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600"--}}
{{--                                    >--}}
{{--                                        Send--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                            </div>


{{--                            <form wire:submit.prevent="sendMessage" class="mt-4">--}}
{{--                                <input--}}
{{--                                    wire:model="message"--}}
{{--                                    class="flex items-center h-12 w-full rounded-lg border border-gray-300 shadow-sm px-4 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 ease-in-out"--}}
{{--                                    type="text"--}}
{{--                                    placeholder="Type your message…"--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    type="submit"--}}
{{--                                    class="w-full p-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200 ease-in-out shadow-md">--}}
{{--                                    Send message--}}
{{--                                </button>--}}
{{--                            </form>--}}
                        </div>
                    </div>

                    <div class="bg-gray-300 p-4">
                        <form wire:submit.prevent="sendMessage" class="space-y-4">
                            <input
                                wire:model="message"
                                class="flex items-center h-12 w-full rounded-lg border border-gray-300 shadow-sm px-4 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200 ease-in-out"
                                type="text"
                                placeholder="Type your message…"
                                required
                            >
                            <button
                                    type="submit"
                                    class="w-full p-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200 ease-in-out shadow-md">
                                Send message
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Component End  -->

                <!-- Close button -->
                <button @click="showModal = false" class="mt-6 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Close</button>
            </div>
        </div>
    </div>
</div>
