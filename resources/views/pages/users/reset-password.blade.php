<x-app-layout>
    <x-slot name="title">
        Reset Password
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reset Password') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update', $user->id) }}">
            @csrf

            <div class="flex">
                <div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <img class="h-32 w-32 rounded-full object-contain bg-gray-400 border" src="/{{ $user->photo ? "storage/" . $user->photo : "anonymous.png" }}" alt="photo" id="profile-photo">
                </div>
                <div class="flex items-center ml-3">
                    <div class="flex flex-col">
                        <div class="text-xl font-bold text-gray-800">
                            {{ $user->name }}
                        </div>
                        <div class="text-md font-semibold text-gray-600">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Admin Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required :value="old('password')" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="new_password" :value="__('New Password')" />

                <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" required :value="old('new_password')" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="new_password_confirmation" :value="__('Confirm New Password')" />

                <x-input id="new_password_confirmation" class="block mt-1 w-full" type="password" name="new_password_confirmation" required :value="old('new_password_confirmation')" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="/users" class="inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest active:bg-gray-900 focus:outline-none transition ease-in-out duration-150 mr-2 hover:bg-gray-200">
                    Cancel
                </a>
                <x-button class="bg-red-600 hover:bg-red-700">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
