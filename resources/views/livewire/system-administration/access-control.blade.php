<div class="flex flex-col flex-1 w-full overflow-y-auto">
        <div class="flex border-4 rounded-lg">
        <div class="w-7/12">
            <div class="container w-full px-2">

                <!--Title-->
                <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                    Users
                </h1>
                <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example" class="min-w-full table-auto stripe hover mt-6">
                        <thead class="bg-gray-200 text-left text-sm uppercase font-semibold tracking-wider">
                        <tr>
                            <th class="px-4 py-2" data-priority="1">Name</th>
                            <th class="px-4 py-2" data-priority="2">Email</th>
                            <th class="px-4 py-2" data-priority="3">Date Created</th>
                            <th class="px-4 py-2" data-priority="4">Role</th>
                            <th class="px-4 py-2" data-priority="5">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3 text-gray-800">{{ $user->name }}</td>
                                <td class="px-4 py-3 text-gray-800">{{ $user->email }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $user->created_at }}</td>
                                <td class="px-4 py-3 text-gray-600">
                                    @if($user->getRoleNames()->isNotEmpty())
                                        {{ $user->getRoleNames()->implode(', ') }}
                                    @else
                                        <span>No role assigned</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 flex space-x-2">
                                    <div class="flex space-x-2">
                                        <livewire:access-control.assign-user-role :userId="$user->id" />
                                        <button wire:click="$dispatch('editUser', {id: {{ $user->id }}})" type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-xs px-4 py-2 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Edit</button>
                                        <button wire:click="deleteUser({{ $user->id }})"
                                                wire:confirm="Are you sure you want to delete this user?" type="button" class="bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-xs px-4 py-2 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
                <!--/Card-->
            </div>
        </div>
        <div class="w-5/12">
            <!--Title-->
            <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                Create Users
            </h1>

            <!-- component -->
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <form wire:submit="saveUser" >
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-name">
                                Name
                            </label>
                            <input wire:model="userForm.name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-name" type="text" placeholder="Jane Doe">
                            @error('userForm.name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-email">
                                Email
                            </label>
                            <input wire:model="userForm.email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-email" type="email" placeholder="example@domain.com">
                            @error('userForm.email')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Password
                            </label>
                            <input wire:model="userForm.password" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="password" placeholder="******************">
                            <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
                            @error('userForm.password')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg text-sm px-5 py-3 focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-800 transition duration-300">
                            Submit
                        </button>
                        <button type="button"
                                wire:click="resetUserForm"
                                class="w-full bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg text-sm px-5 py-3 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-800 transition duration-300">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="flex mt-4 border-4 rounded-lg">
        <div class="w-7/12">
            <div class="container w-full px-2">

                <!--Title-->
                <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                    Roles
                </h1>
                <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="roles" class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($roles as $role)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $role->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button wire:click="$dispatch('editRole', {id: {{ $role->id }}})"
                                            type="button"
                                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-xs px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        Edit
                                    </button>
                                    <button wire:click="deleteRole({{ $role->id }})"
                                            wire:confirm="Are you sure you want to delete this role?"
                                            type="button"
                                            class="bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-xs px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
                <!--/Card-->
            </div>
        </div>
        <div class="w-5/12">
            <!--Title-->
            <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                Create Role
            </h1>
            <!-- component -->
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <form wire:submit="saveRole">
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-role">
                                Role Name
                            </label>
                            <input wire:model="form.name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-name" type="text" placeholder="System Administrator">
                            <p class="text-grey-dark text-xs italic">Make it as descriptive as you'd like</p>
                            @error('name')
                            <p class="text-red-500 dark:text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg text-sm px-5 py-3 focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-800 transition duration-300">
                            Submit
                        </button>
                        <button type="button"
                                wire:click="resetForm"
                                class="w-full bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg text-sm px-5 py-3 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-800 transition duration-300">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

