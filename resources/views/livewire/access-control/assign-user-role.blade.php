<div x-data="{ showModal: false }">
    <!-- Button to open the modal -->
    <button @click="showModal = true" type="button"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
            @keydown.window="handleKeydown">
        Assign Role
    </button>

    @teleport('body')
    <!-- Modal -->
    <div x-show="showModal" x-trap="showModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <!-- Modal content -->
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex justify-center items-center min-h-screen p-4 sm:p-0">
                <div x-show="showModal" @click.outside="showModal = false"
                     class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                    <!-- Modal header (User information) -->
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:px-6">
                        <div class="w-full text-center">
                            @if($user)
                                <p class="text-lg font-medium text-gray-900 dark:text-gray-100">User: <strong>{{ $user->name }}</strong></p>
                            @endif
                        </div>
                    </div>

                    <!-- Modal body (Form for updating roles) -->
                    <div class="bg-white dark:bg-gray-900 px-4 pb-5 sm:p-6 sm:pb-4">
                        @if($user)
                            <form wire:submit.prevent="updateRoles" class="space-y-6">
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    @foreach($roles as $role)
                                        <div class="flex items-center">
                                            <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}"
                                                   class="h-5 w-5 text-indigo-600 dark:text-indigo-500 focus:ring-indigo-500 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700"
                                                   @if(in_array($role->id, $selectedRoles)) checked @endif>
                                            <label for="{{ $role->name }}" class="ml-2 block text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Modal footer (Submit button) -->
                                <div class="flex justify-end">
                                    <button type="submit"
                                            class="bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                                        Update Role
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endteleport
</div>
