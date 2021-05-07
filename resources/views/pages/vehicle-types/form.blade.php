<x-app-layout>
    <x-slot name="title">
        Vehicle Types
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Vehicle Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Vehicle Information</h3>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="/vehicle-types{{ isset($vehicle_type) ? "/".$vehicle_type->id : "" }}" method="POST">
                            @csrf

                            @if (isset($vehicle_type))
                                @method('PUT')
                            @endif

                            <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                                        <input type="text" name="vehicle_type" id="vehicle_type" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ isset($vehicle_type) ? $vehicle_type->vehicle_type : "" }}" required>
                                    </div>
                                </div>
                            </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a href="/vehicle-types" class="inline-flex justify-center py-2 px-4 border border-indigo-400 border-transparent shadow-sm text-sm font-medium rounded-md text-grey-600 bg-white hover:bg-indigo-100 focus:outline-none">
                                        Cancel
                                    </a>
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ isset($vehicle_type) ? "Update" : "Save" }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
