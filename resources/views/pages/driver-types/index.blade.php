<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Driver Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="mb-4 flex justify-end">
                            <a href="/driver-types/create" class="rounded bg-green-500 text-white px-4 py-2 hover:bg-green-600">
                                Add Driver Type
                            </a>
                        </div>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            ID
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
                                    @forelse ($driver_types as $driver_type)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver_type->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $driver_type->driver_type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex">
                                                <a href="/driver-types/{{ $driver_type->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <div>&nbsp;|&nbsp;</div>
                                                <form action="/driver-types/{{ $driver_type->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center" colspan="3">
                                                No Records Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $driver_types->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
