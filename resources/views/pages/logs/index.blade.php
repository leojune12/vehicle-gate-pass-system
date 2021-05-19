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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    {{-- <div class="antialiased sans-serif bg-gray-200">
                        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                            <div class="container mx-auto px-4 py-2 md:py-10">
                                <div class="mb-5 w-64">
                                    <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Select Date</label>
                                    <div class="relative">
                                        <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
                                        <input type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false" class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none text-gray-600 font-medium focus:ring focus:ring-blue-600 focus:ring-opacity-50" placeholder="Select date" readonly />

                                        <div class="absolute top-0 right-0 px-3 py-2">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>

                                        <!-- <div x-text="no_of_days.length"></div>
                                                    <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                    <div x-text="new Date(year, month).getDay()"></div> -->

                                        <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                                            <div class="flex justify-between items-center mb-2">
                                                <div>
                                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                                <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                </div>
                                                <div>
                                                <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 0) {
                                                                                year--;
                                                                                month = 12;
                                                                            } month--; getNoOfDays()">
                                                    <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                                    </svg>
                                                </button>
                                                <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 11) {
                                                                                month = 0;
                                                                                year++;
                                                                            } else {
                                                                                month++;
                                                                            } getNoOfDays()">
                                                    <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </button>
                                                </div>
                                            </div>

                                            <div class="flex flex-wrap mb-3 -mx-1">
                                                <template x-for="(day, index) in DAYS" :key="index">
                                                <div style="width: 14.26%" class="px-0.5">
                                                    <div x-text="day" class="text-gray-800 font-medium text-center text-xs"></div>
                                                </div>
                                                </template>
                                            </div>

                                            <div class="flex flex-wrap -mx-1">
                                                <template x-for="blankday in blankdays">
                                                <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
                                                </template>
                                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                                <div style="width: 14.28%" class="px-1 mb-1">
                                                    <div @click="getDateValue(date)" x-text="date" class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100" :class="{
                                                        'bg-indigo-200': isToday(date) == true,
                                                        'text-gray-600 hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
                                                        'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true
                                                    }"></div>
                                                </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            const MONTH_NAMES = [
                                "January",
                                "February",
                                "March",
                                "April",
                                "May",
                                "June",
                                "July",
                                "August",
                                "September",
                                "October",
                                "November",
                                "December",
                            ];
                            const MONTH_SHORT_NAMES = [
                                "Jan",
                                "Feb",
                                "Mar",
                                "Apr",
                                "May",
                                "Jun",
                                "Jul",
                                "Aug",
                                "Sep",
                                "Oct",
                                "Nov",
                                "Dec",
                            ];
                            const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

                            function app() {
                            return {
                                showDatepicker: false,
                                datepickerValue: "",
                                selectedDate: "2021-02-04",
                                dateFormat: "DD-MM-YYYY",
                                month: "",
                                year: "",
                                no_of_days: [],
                                blankdays: [],
                                initDate() {
                                let today;
                                if (this.selectedDate) {
                                    today = new Date(Date.parse(this.selectedDate));
                                } else {
                                    today = new Date();
                                }
                                this.month = today.getMonth();
                                this.year = today.getFullYear();
                                this.datepickerValue = this.formatDateForDisplay(
                                    today
                                );
                                },
                                formatDateForDisplay(date) {
                                let formattedDay = DAYS[date.getDay()];
                                let formattedDate = ("0" + date.getDate()).slice(
                                    -2
                                ); // appends 0 (zero) in single digit date
                                let formattedMonth = MONTH_NAMES[date.getMonth()];
                                let formattedMonthShortName =
                                    MONTH_SHORT_NAMES[date.getMonth()];
                                let formattedMonthInNumber = (
                                    "0" +
                                    (parseInt(date.getMonth()) + 1)
                                ).slice(-2);
                                let formattedYear = date.getFullYear();
                                if (this.dateFormat === "DD-MM-YYYY") {
                                    return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
                                }
                                if (this.dateFormat === "YYYY-MM-DD") {
                                    return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
                                }
                                if (this.dateFormat === "D d M, Y") {
                                    return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
                                }
                                return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
                                },
                                isSelectedDate(date) {
                                const d = new Date(this.year, this.month, date);
                                return this.datepickerValue ===
                                    this.formatDateForDisplay(d) ?
                                    true :
                                    false;
                                },
                                isToday(date) {
                                const today = new Date();
                                const d = new Date(this.year, this.month, date);
                                return today.toDateString() === d.toDateString() ?
                                    true :
                                    false;
                                },
                                getDateValue(date) {
                                let selectedDate = new Date(
                                    this.year,
                                    this.month,
                                    date
                                );
                                this.datepickerValue = this.formatDateForDisplay(
                                    selectedDate
                                );
                                // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                                this.isSelectedDate(date);
                                this.showDatepicker = false;
                                },
                                getNoOfDays() {
                                let daysInMonth = new Date(
                                    this.year,
                                    this.month + 1,
                                    0
                                ).getDate();
                                // find where to start calendar day of week
                                let dayOfWeek = new Date(
                                    this.year,
                                    this.month
                                ).getDay();
                                let blankdaysArray = [];
                                for (var i = 1; i <= dayOfWeek; i++) {
                                    blankdaysArray.push(i);
                                }
                                let daysArray = [];
                                for (var i = 1; i <= daysInMonth; i++) {
                                    daysArray.push(i);
                                }
                                this.blankdays = blankdaysArray;
                                this.no_of_days = daysArray;
                                },
                            };
                            }
                        </script>
                    </div> --}}
                    {{-- <div x-data="dropdown()">
                        <button x-on:click="open">Open</button>

                        <div x-show="isOpen()" x-on:click.away="close">
                            // Dropdown
                        </div>
                    </div> --}}
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8" x-data="app()">
                        <form x-bind:action="formAction" method="get" id="form">
                            <div class="grid grid-cols-6 gap-2 mb-3">
                                <div class="flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-l-md" placeholder="Name" value="{{ $name }}">
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
                                    <input type="text" name="date" id="date" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-l-md" placeholder="Date" value="{{ $date }}">
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
                                        <path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
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
                                'date' => $date
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
                                    }, 500)
                                },
                                exportLogs() {
                                    this.formAction = this.exportAction
                                    setTimeout(function() {
                                        document.getElementById("form").submit()
                                    }, 500)
                                }
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
