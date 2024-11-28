<!-- This is an example component -->
<div class="container mx-auto shadow-lg rounded-lg">
    <!-- headaer -->
    <div class="px-5 py-5 flex justify-between items-center bg-white border-b-2">
        <div class="font-semibold text-2xl">PlanUSDT Chat</div>
        <div class="w-1/2">

        </div>
        <div class="h-24 w-24 p-2 bg-yellow-500 rounded-full text-white font-semibold flex items-center justify-center">
            {{ auth()->user()->name }}
        </div>
    </div>
    <!-- end header -->
    <!-- Chatting -->
    <div class="flex flex-row justify-between bg-white">
        <!-- message -->
        <div class="w-full px-5 flex flex-col justify-between">
            <h1 class="font-bold text-xl">{{ $userChat->user->name }}'s messages</h1>
            <div class="flex flex-col mt-5">
                <div>
                    @foreach($getChats as $getChat)
                        @if($getChat->admin_response)
                            <!-- Admin Response -->
                            <div class="flex justify-end mb-4">
                                <div
                                    class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
                                >
                                    {{ $getChat->admin_response }}
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-8 w-8" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                            </div>
                        @elseif($getChat->message)
                            <!-- User Message -->
                            <div class="flex justify-start mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-8 w-8" viewBox="0 0 16 16">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0m2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755"/>
                                </svg>
                                <div
                                    class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white"
                                >
                                    {{ $getChat->message }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <form wire:submit.prevent="respond" class="flex items-center space-x-3 py-5">
                    <!-- Input Field -->
                    <input
                        wire:model="admin_response"
                        class="flex-grow bg-gray-300 py-3 px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="text"
                        placeholder="Type your message here..."
                    />
                    <!-- Reply Button -->
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-xl transition duration-200"
                    >
                        Reply
                    </button>
                </form>

            </div>
        <!-- end message -->
        <div class="w-2/5 border-l-2 px-5">

        </div>
    </div>
</div>
</div>
