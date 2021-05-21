<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            @role('admin')
            <div class="flex justify-end">
                <a href="/drivers/create" class="rounded bg-green-500 text-white px-3 py-1 hover:bg-green-600 flex items-center">
                    <span>
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                        </svg>
                    </span>
                    <span>Add Driver</span>
                </a>
            </div>
            @endrole
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('status'))
            <div class="py-4 px-6 bg-green-400 rounded-md mb-4 text-white flex items-center">
                <span class="mr-2">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg>
                </span>
                <span>
                    {{ session('status') }}
                </span>
            </div>
            @endisset

            <div class="grid md:grid-cols-4 grid-cols-1 gap-4">
                {{-- Drivers --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/drivers" class="font-medium hover:underline text-gray-500">Drivers</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $drivers }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M2,3H22C23.05,3 24,3.95 24,5V19C24,20.05 23.05,21 22,21H2C0.95,21 0,20.05 0,19V5C0,3.95 0.95,3 2,3M14,6V7H22V6H14M14,8V9H21.5L22,9V8H14M14,10V11H21V10H14M8,13.91C6,13.91 2,15 2,17V18H14V17C14,15 10,13.91 8,13.91M8,6A3,3 0 0,0 5,9A3,3 0 0,0 8,12A3,3 0 0,0 11,9A3,3 0 0,0 8,6Z" />
                        </svg>
                    </div>
                </div>
                {{-- Logs --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/logs" class="font-medium hover:underline text-gray-500">Logs</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $logs }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M10.63,14.1C12.23,10.58 16.38,9.03 19.9,10.63C23.42,12.23 24.97,16.38 23.37,19.9C22.24,22.4 19.75,24 17,24C14.3,24 11.83,22.44 10.67,20H1V18C1.06,16.86 1.84,15.93 3.34,15.18C4.84,14.43 6.72,14.04 9,14C9.57,14 10.11,14.05 10.63,14.1V14.1M9,4C10.12,4.03 11.06,4.42 11.81,5.17C12.56,5.92 12.93,6.86 12.93,8C12.93,9.14 12.56,10.08 11.81,10.83C11.06,11.58 10.12,11.95 9,11.95C7.88,11.95 6.94,11.58 6.19,10.83C5.44,10.08 5.07,9.14 5.07,8C5.07,6.86 5.44,5.92 6.19,5.17C6.94,4.42 7.88,4.03 9,4M17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14Z" />
                        </svg>
                    </div>
                </div>
                @role('admin')
                {{-- Users --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/users" class="font-medium hover:underline text-gray-500">Users</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $users }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z" />
                        </svg>
                    </div>
                </div>
                {{-- User Roles --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/user-roles" class="font-medium hover:underline text-gray-500">User Roles</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $user_roles }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z" />
                        </svg>
                    </div>
                </div>
                {{-- User Roles --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/user-types" class="font-medium hover:underline text-gray-500">User Types</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $user_types }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                        </svg>
                    </div>
                </div>
                {{-- Driver Types --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/driver-types" class="font-medium hover:underline text-gray-500">Driver Types</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $driver_types }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M4 3H18C19.11 3 20 3.9 20 5V12.08C18.45 11.82 16.92 12.18 15.68 13H12V17H13.08C12.97 17.68 12.97 18.35 13.08 19H4C2.9 19 2 18.11 2 17V5C2 3.9 2.9 3 4 3M4 7V11H10V7H4M12 7V11H18V7H12M4 13V17H10V13H4M23 22V21C23 19.67 20.33 19 19 19S15 19.67 15 21V22H23M19 14C17.9 14 17 14.9 17 16S17.9 18 19 18 21 17.11 21 16 20.11 14 19 14Z" />
                        </svg>
                    </div>
                </div>
                {{-- Vehicle Types --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/vehicle-types" class="font-medium hover:underline text-gray-500">Vehicle Types</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $vehicle_types }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M8,11L9.5,6.5H18.5L20,11M18.5,16A1.5,1.5 0 0,1 17,14.5A1.5,1.5 0 0,1 18.5,13A1.5,1.5 0 0,1 20,14.5A1.5,1.5 0 0,1 18.5,16M9.5,16A1.5,1.5 0 0,1 8,14.5A1.5,1.5 0 0,1 9.5,13A1.5,1.5 0 0,1 11,14.5A1.5,1.5 0 0,1 9.5,16M19.92,6C19.71,5.4 19.14,5 18.5,5H9.5C8.86,5 8.29,5.4 8.08,6L6,12V20A1,1 0 0,0 7,21H8A1,1 0 0,0 9,20V19H19V20A1,1 0 0,0 20,21H21A1,1 0 0,0 22,20V12L19.92,6M14.92,3C14.71,2.4 14.14,2 13.5,2H4.5C3.86,2 3.29,2.4 3.08,3L1,9V17A1,1 0 0,0 2,18H3A1,1 0 0,0 4,17V12.91C3.22,12.63 2.82,11.77 3.1,11C3.32,10.4 3.87,10 4.5,10H4.57L5.27,8H3L4.5,3.5H15.09L14.92,3Z" />
                        </svg>
                    </div>
                </div>
                {{-- Log Types --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/log-types" class="font-medium hover:underline text-gray-500">Log Types</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $log_types }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14,12H15.5V14.82L17.94,16.23L17.19,17.53L14,15.69V12M4,2H18A2,2 0 0,1 20,4V10.1C21.24,11.36 22,13.09 22,15A7,7 0 0,1 15,22C13.09,22 11.36,21.24 10.1,20H4A2,2 0 0,1 2,18V4A2,2 0 0,1 4,2M4,15V18H8.67C8.24,17.09 8,16.07 8,15H4M4,8H10V5H4V8M18,8V5H12V8H18M4,13H8.29C8.63,11.85 9.26,10.82 10.1,10H4V13M15,10.15A4.85,4.85 0 0,0 10.15,15C10.15,17.68 12.32,19.85 15,19.85A4.85,4.85 0 0,0 19.85,15C19.85,12.32 17.68,10.15 15,10.15Z" />
                        </svg>
                    </div>
                </div>
                {{-- Courses --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/courses" class="font-medium hover:underline text-gray-500">Courses</a>
                        <span class="font font-semibold text-3xl text-gray-700">{{ $courses }}</span>
                    </div>
                    <div class="text-blue-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z" />
                        </svg>
                    </div>
                </div>
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>
