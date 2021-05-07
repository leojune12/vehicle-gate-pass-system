<x-app-layout>
    <x-slot name="title">
        Drivers
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Drivers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="mb-4 flex justify-end">
                            <a href="/drivers/create" class="rounded bg-green-500 text-white px-4 py-2 hover:bg-green-600 flex items-center">
                                <span>Add Driver</span>
                            </a>
                        </div>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            RFID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Contact Number
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Vehicle Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Driver Type
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
                                                {{ $driver->rfid }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->address }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->contact_number }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->vehicle_type->vehicle_type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver->driver_type->driver_type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex">
                                                <a href="/drivers/{{ $driver->id }}" class="text-indigo-600 hover:text-indigo-900">View Logs</a>
                                                <div>&nbsp;|&nbsp;</div>
                                                <a href="/drivers/{{ $driver->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <div>&nbsp;|&nbsp;</div>
                                                <form action="/drivers/{{ $driver->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900">Delete</button>
                                                </form>
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
