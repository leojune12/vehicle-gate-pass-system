<x-app-layout>
    <x-slot name="title">
        Drivers
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Drivers') }}
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
            <div class="">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">

                        @if(session('status'))
                        <div class="py-4 px-6 bg-green-400 rounded-md mb-3 text-white flex items-center">
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

                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            RFID
                                        </th>
                                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Contact Number
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Vehicle Type
                                        </th> --}}
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Driver Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Course
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Plate No.
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($drivers as $driver)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full object-contain bg-gray-400 border" src="/{{ $driver->photo ? "storage/" . $driver->photo : "anonymous.png" }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        {{ $driver->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->rfid }}
                                            </td>
                                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->address }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->contact_number }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ @$driver->vehicle_type->vehicle_type }}
                                            </td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ @$driver->driver_type->driver_type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ @$driver->course->course }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->plate_number }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex">
                                                    <a href="/drivers/show-driver/{{ $driver->id }}" class="text-indigo-600 hover:text-indigo-900">Profile</a>
                                                    <div>&nbsp;|&nbsp;</div>
                                                    <a href="/drivers/{{ $driver->id }}" class="text-indigo-600 hover:text-indigo-900">Logs</a>
                                                    @role('admin')
                                                    <div>&nbsp;|&nbsp;</div>
                                                    <a href="/drivers/{{ $driver->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <div>&nbsp;|&nbsp;</div>
                                                    <form action="/drivers/{{ $driver->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-indigo-600 hover:text-indigo-900">Delete</button>
                                                    </form>
                                                    @endrole
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center" colspan="7">
                                                No Records Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $drivers->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
