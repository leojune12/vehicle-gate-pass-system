<x-app-layout>
    <x-slot name="title">
        Users
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">User Information</h3>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form action="/users{{ isset($user) ? "/".$user->id : "" }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if (isset($user))
                                @method('PUT')
                            @endif

                            <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="off"
                                        @if (old('name') != null)
                                            value="{{ old('name') }}"
                                        @else
                                            value="{{ isset($user) ? $user->name :  "" }}"
                                        @endif
                                        >
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="off"
                                        @if (old('email') != null)
                                            value="{{ old('email') }}"
                                        @else
                                            value="{{ isset($user) ? $user->email :  "" }}"
                                        @endif
                                        >
                                    </div>

                                    @if (!isset($user))
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                        <input type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                    </div>
                                    @else

                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    @endif

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="user_role" class="block text-sm font-medium text-gray-700">User Role</label>
                                        <select id="user_role" name="user_role" autocomplete="user_role" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                            <option value="">Select Role</option>
                                            @foreach ($user_roles as $user_role)
                                                <option
                                                    @if (old('user_role') != null)
                                                        {{ $user_role == old('user_role') ? "selected" : "" }}
                                                    @else
                                                        {{ $user_role == @$user->user_role ? "selected" : "" }}
                                                    @endif
                                                >
                                                    {{ $user_role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="user_type_id" class="block text-sm font-medium text-gray-700">User Type</label>
                                        <select id="user_type_id" name="user_type_id" autocomplete="driver_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                            <option value="">Select Type</option>
                                            @foreach ($user_types as $user_type)
                                                <option value="{{ $user_type->id }}"
                                                    @if (old('user_type_id') != null)
                                                        {{ $user_type->id == old('user_type_id') ? "selected" : "" }}
                                                    @else
                                                        {{ $user_type->id == @$user->user_type->id ? "selected" : "" }}
                                                    @endif
                                                >
                                                    {{ $user_type->user_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        @if(isset($user->photo))
                                            <label for="profile-photo" class="block text-sm font-medium text-gray-700">
                                                Photo
                                            </label>
                                            <div class="flex-shrink-0 h-40 w-40">
                                                <img class="h-40 w-40 rounded-full object-contain bg-gray-400 border" src="/{{ $user->photo ? "storage/" . $user->photo : "anonymous.png" }}" alt="photo" id="profile-photo">
                                            </div>
                                            <button class="rounded py-1 px-3 bg-white hover:bg-gray-100 border mt-2 text-sm w-40" type="submit" form="delete-photo">
                                                Remove Photo
                                            </button>
                                        @else
                                            <label for="photo" class="block text-sm font-medium text-gray-700">
                                                Photo
                                            </label>
                                            <input type="file" name="photo" id="photo" class="mt-1 text-sm"
                                            >
                                        @endif
                                    </div>

                                </div>
                            </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a href="/users" class="inline-flex justify-center py-2 px-4 border border-indigo-400 border-transparent shadow-sm text-sm font-medium rounded-md text-grey-600 bg-white hover:bg-indigo-100 focus:outline-none">
                                        Cancel
                                    </a>
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ isset($user) ? "Update" : "Save" }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- Profile Photo --}}
                        <form action="/delete-user-photo/{{ @$user->id }}" method="POST" id="delete-photo">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
