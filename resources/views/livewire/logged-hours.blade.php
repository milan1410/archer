<div class="p-4">
    <h1 class="text-lg font-semibold mb-4">Logged Hours</h1>

    <!-- Export CSV Button -->
    <button wire:click="export" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 mb-4 transition duration-200">
        Download CSV
    </button>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md p-5">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="">
                    <th class="px-4 py-2 text-left">Department</th>
                    <th class="px-4 py-2 text-left">Project</th>
                    <th class="px-4 py-2 text-left">Subproject</th>
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-left">Start Time</th>
                    <th class="px-4 py-2 text-left">End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr class="hover:bg-gray-100 hover:text-black">
                        <td class="border px-4 py-2">{{ $log->subproject->project->department->name }}</td>
                        <td class="border px-4 py-2">{{ $log->subproject->project->name }}</td>
                        <td class="border px-4 py-2">{{ $log->subproject->name }}</td>
                        <td class="border px-4 py-2">{{ $log->date }}</td>
                        <td class="border px-4 py-2">{{ $log->start_time }}</td>
                        <td class="border px-4 py-2">{{ $log->end_time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
