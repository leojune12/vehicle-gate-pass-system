<x-app-layout>
    <x-slot name="title">
        User Types
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Types') }}
            </h2>
            <div class="flex justify-end">
                <span>
                    <a href="/user-types/create" class="rounded bg-green-500 text-white px-3 py-1 hover:bg-green-600 flex items-center">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                            </svg>
                        </span>
                        <span>
                            Add User Type
                        </span>
                    </a>
                </span>
            </div>
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
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($user_types as $user_type)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $user_type->user_type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex">
                                                <a href="/user-types/{{ $user_type->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <div>&nbsp;|&nbsp;</div>
                                                <form action="/user-types/{{ $user_type->id }}" method="POST" x-data="delete_{{ $user_type->id }}()" id="form-{{ $user_type->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="text-indigo-600 hover:text-indigo-900 focus:outline-none" @click="confirmDelete()">Delete</button>
                                                </form>
                                                <script>
                                                    function delete_{{ $user_type->id }}() {
                                                        return {
                                                            show: true,
                                                            confirmDelete() {
                                                                if (confirm("Delete user type?")) {
                                                                    document.getElementById('form-{{ $user_type->id }}').submit()
                                                                }
                                                            }
                                                        }
                                                    }
                                                </script>
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
                            {{ $user_types->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
