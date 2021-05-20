<x-app-layout>
    <x-slot name="title">
        Logs
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <link rel="stylesheet" href="{{ asset('css/pikaday.css') }}">
        <script src="{{ asset('js/pikaday.js') }}"></script>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 py-1">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8" x-data="app()">
                        <form x-bind:action="formAction" method="get" id="form">
                            <div class="grid grid-cols-6 gap-2 mb-3">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-l-md" placeholder="Name" value="{{ $name }}" autocomplete="off">
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                        </svg>
                                    </span>
                                </div>

                                <div class="flex rounded-md shadow-sm">
                                    <select id="log_type_id" name="log_type_id" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-l-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select Log Type</option>
                                        @foreach ($log_types as $log_type)
                                            <option value="{{ $log_type->id }}"
                                                @if ($log_type) != null)
                                                    {{ $log_type->id == $log_type_id ? "selected" : "" }}
                                                @endif
                                            >
                                                {{ $log_type->log_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M14,12H15.5V14.82L17.94,16.23L17.19,17.53L14,15.69V12M4,2H18A2,2 0 0,1 20,4V10.1C21.24,11.36 22,13.09 22,15A7,7 0 0,1 15,22C13.09,22 11.36,21.24 10.1,20H4A2,2 0 0,1 2,18V4A2,2 0 0,1 4,2M4,15V18H8.67C8.24,17.09 8,16.07 8,15H4M4,8H10V5H4V8M18,8V5H12V8H18M4,13H8.29C8.63,11.85 9.26,10.82 10.1,10H4V13M15,10.15A4.85,4.85 0 0,0 10.15,15C10.15,17.68 12.32,19.85 15,19.85A4.85,4.85 0 0,0 19.85,15C19.85,12.32 17.68,10.15 15,10.15Z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" name="start_date" id="start_date" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-l-md" placeholder="Start Date" value="{{ @$start_date }}" autocomplete="off" x-data x-init="new Pikaday({
                                        field: $el,
                                        format: 'YYYY MM DD',
                                        toString(date, format) {
                                            const day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate()
                                            const month = (date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1)
                                            const year = date.getFullYear()
                                            return `${year}-${month}-${day}`
                                        },
                                    })">
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M9,10V12H7V10H9M13,10V12H11V10H13M17,10V12H15V10H17M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H6V1H8V3H16V1H18V3H19M19,19V8H5V19H19M9,14V16H7V14H9M13,14V16H11V14H13M17,14V16H15V14H17Z" />
                                        </svg>
                                    </span>
                                </div>

                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" name="end_date" id="end_date" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-l-md" placeholder="End Date" value="{{ @$end_date }}" autocomplete="off" x-data x-init="new Pikaday({
                                        field: $el,
                                        format: 'YYYY MM DD',
                                        toString(date, format) {
                                            const day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate()
                                            const month = (date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1)
                                            const year = date.getFullYear()
                                            return `${year}-${month}-${day}`
                                        },
                                    })">
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M9,10V12H7V10H9M13,10V12H11V10H13M17,10V12H15V10H17M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H6V1H8V3H16V1H18V3H19M19,19V8H5V19H19M9,14V16H7V14H9M13,14V16H11V14H13M17,14V16H15V14H17Z" />
                                        </svg>
                                    </span>
                                </div>

                                <button type="button" x-on:click="filter()" class="bg-blue-600 hover:bg-blue-700 text-white px-3 text-xs rounded-md outline-none focus:outline-none flex items-center justify-center">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                                    </svg>
                                    <span>Search</span>
                                </button>

                                <button type="button" x-on:click="exportLogs()" class="bg-blue-600 hover:bg-blue-700 text-white px-3 text-xs rounded-md outline-none focus:outline-none flex items-center justify-center">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z" />
                                    </svg>
                                    <span>Export</span>
                                </button>
                            </div>
                        </form>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Driver
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Log Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Time
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($logs as $log)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $log->driver->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $log->log_type->log_type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $log->time }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center" colspan="4">
                                                No Records Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $logs->onEachSide(5)->links('vendor.pagination.tailwind', [
                                'name' => $name,
                                'log_type_id' => $log_type_id,
                                'start_date' => $start_date,
                                'end_date' => $end_date,
                            ]) }}
                        </div>
                    </div>
                    <script>
                        function app() {
                            return {
                                formAction: '',
                                filterAction: '/logs/filter',
                                exportAction: '/logs/export',
                                filter() {
                                    this.formAction = this.filterAction
                                    setTimeout(function() {
                                        document.getElementById("form").submit()
                                    }, 100)
                                },
                                exportLogs() {
                                    this.formAction = this.exportAction
                                    setTimeout(function() {
                                        document.getElementById("form").submit()
                                    }, 100)
                                },
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
