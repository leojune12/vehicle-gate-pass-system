<x-app-layout>
    <x-slot name="title">
        Drivers
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Driver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Driver Information</h3>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form action="/drivers{{ isset($driver) ? "/".$driver->id : "" }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if (isset($driver))
                                @method('PUT')
                            @endif

                            <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="rfid" class="block text-sm font-medium text-gray-700">RFID</label>
                                        <input type="text" name="rfid" id="rfid" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required
                                        @if (old('rfid') != null)
                                            value="{{ old('rfid') }}"
                                        @else
                                            value="{{ isset($driver) ? $driver->rfid :  "" }}"
                                        @endif
                                        >
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required
                                        @if (old('name') != null)
                                            value="{{ old('name') }}"
                                        @else
                                            value="{{ isset($driver) ? $driver->name : "" }}"
                                        @endif
                                        >
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                        <input type="text" name="address" id="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required
                                        @if (old('address') != null)
                                            value="{{ old('address') }}"
                                        @else
                                            value="{{ isset($driver) ? $driver->address : "" }}"
                                        @endif
                                        >
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                        <input type="text" name="contact_number" id="contact_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required
                                        @if (old('contact_number') != null)
                                            value="{{ old('contact_number') }}"
                                        @else
                                            value="{{ isset($driver) ? $driver->contact_number : "" }}"
                                        @endif
                                        >
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="vehicle_type_id" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                                        <select id="vehicle_type_id" name="vehicle_type_id" autocomplete="driver_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                            <option value="">Select Type</option>
                                            @foreach ($vehicle_types as $vehicle_type)
                                                <option value="{{ $vehicle_type->id }}"
                                                    @if (old('vehicle_type_id') != null)
                                                        {{ $vehicle_type->id == old('vehicle_type_id') ? "selected" : "" }}
                                                    @else
                                                        {{ $vehicle_type->id == @$driver->vehicle_type->id ? "selected" : "" }}
                                                    @endif
                                                >
                                                    {{ $vehicle_type->vehicle_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="driver_type_id" class="block text-sm font-medium text-gray-700">Driver Type</label>
                                        <select id="driver_type_id" name="driver_type_id" autocomplete="driver_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                            <option value="">Select Type</option>
                                            @foreach ($driver_types as $driver_type)
                                                <option value="{{ $driver_type->id }}"
                                                    @if (old('vehicle_type_id') != null)
                                                        {{ $driver_type->id == old('driver_type_id') ? "selected" : "" }}
                                                    @else
                                                        {{ $driver_type->id === @$driver->driver_type->id ? "selected" : "" }}
                                                    @endif
                                                    >
                                                    {{ $driver_type->driver_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                                        <select id="courseid" name="course_id" autocomplete="driver_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Select Course</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    @if (old('vehicle_type_id') != null)
                                                        {{ $course->id == old('course_id') ? "selected" : "" }}
                                                    @else
                                                        {{ $course->id === @$driver->course->id ? "selected" : "" }}
                                                    @endif
                                                    >
                                                    {{ $course->course }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="plate_number" class="block text-sm font-medium text-gray-700">Plate Number</label>
                                        <input type="text" name="plate_number" id="plate_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required
                                        @if (old('plate_number') != null)
                                            value="{{ old('plate_number') }}"
                                        @else
                                            value="{{ isset($driver) ? $driver->plate_number : "" }}"
                                        @endif
                                        >
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        @if(isset($driver->photo))
                                            <label for="profile-photo" class="block text-sm font-medium text-gray-700">
                                                Photo
                                            </label>
                                            <div class="flex-shrink-0 h-40 w-40">
                                                <img class="h-40 w-40 rounded-full object-contain bg-gray-400 border" src="/{{ $driver->photo ? "storage/" . $driver->photo : "anonymous.png" }}" alt="photo" id="profile-photo">
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
                                <a href="/drivers" class="inline-flex justify-center py-2 px-4 border border-indigo-400 border-transparent shadow-sm text-sm font-medium rounded-md text-grey-600 bg-white hover:bg-indigo-100 focus:outline-none">
                                    Cancel
                                </a>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ isset($driver) ? "Update" : "Save" }}
                                </button>
                            </div>
                        </form>
                        {{-- Profile Photo --}}
                        <form action="/delete-driver-photo/{{ @$driver->id }}" method="POST" id="delete-photo">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
