<?php 

namespace App\Exports;

use App\Models\TimeLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimeLogsExport implements FromCollection, WithHeadings
{
    protected $userId;

    // Inject user ID into the export class
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    // Fetch the logs data for the authenticated user
    public function collection()
    {
        return TimeLog::with(['subproject.project.department'])
            ->where('user_id', $this->userId)
            ->get()
            ->map(function ($log) {
                return [
                    $log->subproject->project->department->name,
                    $log->subproject->project->name,
                    $log->subproject->name,
                    $log->date,
                    $log->start_time,
                    $log->end_time,
                ];
            });
    }

    // Define the headers for the CSV
    public function headings(): array
    {
        return [
            'Department',
            'Project',
            'Subproject',
            'Date',
            'Start Time',
            'End Time',
        ];
    }
}
