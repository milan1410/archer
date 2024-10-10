<?php

namespace App\Livewire;

use Livewire\Component;

class ManageTimeLogs extends Component
{
    public function render()
    {
        return view('livewire.manage-time-logs');
    }
    
    public function exportToCsv()
    {
        $logs = $this->queryLogs()->get();
        return response()->streamDownload(function () use ($logs) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Employee', 'Department', 'Project', 'Subproject', 'Date', 'Start Time', 'End Time', 'Total Hours']);
            foreach ($logs as $log) {
                fputcsv($file, [$log->user->name, $log->subproject->project->department->name, $log->subproject->project->name, $log->subproject->name, $log->date, $log->start_time, $log->end_time, $log->total_hours]);
            }
            fclose($file);
        }, 'time_logs.csv');
    }
}
