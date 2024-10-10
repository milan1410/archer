<div>
    <h2 class="text-lg font-bold mb-4">Your Logged Hours</h2>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Date</th>
                <th>Department</th>
                <th>Project</th>
                <th>Subproject</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timeLogs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->subproject->project->department->name }}</td>
                    <td>{{ $log->subproject->project->name }}</td>
                    <td>{{ $log->subproject->name }}</td>
                    <td>{{ $log->start_time }}</td>
                    <td>{{ $log->end_time }}</td>
                    <td>{{ $log->total_hours }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
