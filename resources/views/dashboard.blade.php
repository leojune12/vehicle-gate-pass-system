<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/users" class="font-bold hover:underline text-gray-500">Users</a>
                        <span class="font font-black text-3xl text-gray-700">{{ $users }}</span>
                    </div>
                    <div class="text-gray-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z" />
                        </svg>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/drivers" class="font-bold hover:underline text-gray-500">Drivers</a>
                        <span class="font font-black text-3xl text-gray-700">{{ $drivers }}</span>
                    </div>
                    <div class="text-gray-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M2,3H22C23.05,3 24,3.95 24,5V19C24,20.05 23.05,21 22,21H2C0.95,21 0,20.05 0,19V5C0,3.95 0.95,3 2,3M14,6V7H22V6H14M14,8V9H21.5L22,9V8H14M14,10V11H21V10H14M8,13.91C6,13.91 2,15 2,17V18H14V17C14,15 10,13.91 8,13.91M8,6A3,3 0 0,0 5,9A3,3 0 0,0 8,12A3,3 0 0,0 11,9A3,3 0 0,0 8,6Z" />
                        </svg>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/logs" class="font-bold hover:underline text-gray-500">Logs</a>
                        <span class="font font-black text-3xl text-gray-700">{{ $logs }}</span>
                    </div>
                    <div class="text-gray-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14,12H15.5V14.82L17.94,16.23L17.19,17.53L14,15.69V12M4,2H18A2,2 0 0,1 20,4V10.1C21.24,11.36 22,13.09 22,15A7,7 0 0,1 15,22C13.09,22 11.36,21.24 10.1,20H4A2,2 0 0,1 2,18V4A2,2 0 0,1 4,2M4,15V18H8.67C8.24,17.09 8,16.07 8,15H4M4,8H10V5H4V8M18,8V5H12V8H18M4,13H8.29C8.63,11.85 9.26,10.82 10.1,10H4V13M15,10.15A4.85,4.85 0 0,0 10.15,15C10.15,17.68 12.32,19.85 15,19.85A4.85,4.85 0 0,0 19.85,15C19.85,12.32 17.68,10.15 15,10.15Z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/driver-types" class="font-bold hover:underline text-gray-500">Driver Types</a>
                        <span class="font font-black text-3xl text-gray-700">{{ $driver_types }}</span>
                    </div>
                    <div class="text-gray-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M4 3H18C19.11 3 20 3.9 20 5V12.08C18.45 11.82 16.92 12.18 15.68 13H12V17H13.08C12.97 17.68 12.97 18.35 13.08 19H4C2.9 19 2 18.11 2 17V5C2 3.9 2.9 3 4 3M4 7V11H10V7H4M12 7V11H18V7H12M4 13V17H10V13H4M23 22V21C23 19.67 20.33 19 19 19S15 19.67 15 21V22H23M19 14C17.9 14 17 14.9 17 16S17.9 18 19 18 21 17.11 21 16 20.11 14 19 14Z" />
                        </svg>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/vehicle-types" class="font-bold hover:underline text-gray-500">Vehicle Types</a>
                        <span class="font font-black text-3xl text-gray-700">{{ $vehicle_types }}</span>
                    </div>
                    <div class="text-gray-600 flex items-center">
                        <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5,11L6.5,6.5H17.5L19,11M17.5,16A1.5,1.5 0 0,1 16,14.5A1.5,1.5 0 0,1 17.5,13A1.5,1.5 0 0,1 19,14.5A1.5,1.5 0 0,1 17.5,16M6.5,16A1.5,1.5 0 0,1 5,14.5A1.5,1.5 0 0,1 6.5,13A1.5,1.5 0 0,1 8,14.5A1.5,1.5 0 0,1 6.5,16M18.92,6C18.72,5.42 18.16,5 17.5,5H6.5C5.84,5 5.28,5.42 5.08,6L3,12V20A1,1 0 0,0 4,21H5A1,1 0 0,0 6,20V19H18V20A1,1 0 0,0 19,21H20A1,1 0 0,0 21,20V12L18.92,6Z" />
                        </svg>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-6 border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="/log-types" class="font-bold hover:underline text-gray-500">Log Types</a>
                        <span class="font font-black text-3xl text-gray-700">{{ $log_types }}</span>
                    </div>
                    <div class="text-gray-600 flex items-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
