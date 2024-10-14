<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimeLog;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TimeLogsExport;
use Illuminate\Support\Facades\Response;

class LoggedHours extends Component
{
    public function render()
    {
        $logs = TimeLog::with(['subproject.project.department'])
            ->where('user_id', Auth::id())
            ->get();
        //echo '<pre>';print_r($logs->toArray());die;
        return view('livewire.logged-hours', compact('logs'))
        ->layout('layouts.app');  // Specify the layout here
    }

    public function export()
    {
        // Fetch time logs for the authenticated user
        $logs = TimeLog::with(['subproject.project.department'])
            ->where('user_id', auth()->id())
            ->get();

        // Define the CSV file name
        $filename = 'time_logs_' . date('Y-m-d_H-i-s') . '.csv';

        // Set headers for download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Open output stream
        $output = fopen('php://output', 'w');

        // CSV headers
        fputcsv($output, ['Department', 'Project', 'Subproject', 'Date', 'Start Time', 'End Time']); 

        // Populate CSV data
        foreach ($logs as $log) {
            fputcsv($output, [
                $log->subproject->project->department->name,
                $log->subproject->project->name,
                $log->subproject->name,
                $log->date,
                $log->start_time,
                $log->end_time,
            ]);
        }

        // Close output stream
        fclose($output);

        // Since the headers have already been sent, no need to return anything
        exit(); // Stop further execution
    }

}

