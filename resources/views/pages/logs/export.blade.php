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
