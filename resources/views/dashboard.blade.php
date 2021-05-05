<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                        <a href="/users" class="font-bold hover:underline text-gray-500">Users</a>
                        <span class="font font-black text-3xl">{{ $users }}</span>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                        <a href="/drivers" class="font-bold hover:underline text-gray-500">Drivers</a>
                        <span class="font font-black text-3xl">{{ $drivers }}</span>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                        <a href="/logs" class="font-bold hover:underline text-gray-500">Logs</a>
                        <span class="font font-black text-3xl">{{ $logs }}</span>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                        <a href="/driver-types" class="font-bold hover:underline text-gray-500">Driver Types</a>
                        <span class="font font-black text-3xl">{{ $driver_types }}</span>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                        <a href="/vehicle-types" class="font-bold hover:underline text-gray-500">Vehicle Types</a>
                        <span class="font font-black text-3xl">{{ $vehicle_types }}</span>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                        <a href="/log-types" class="font-bold hover:underline text-gray-500">Log Types</a>
                        <span class="font font-black text-3xl">{{ $log_types }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
