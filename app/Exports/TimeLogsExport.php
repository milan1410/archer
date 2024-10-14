<?php 

namespace App\Exports;

use App\Models\TimeLog;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimeLogsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return TimeLog::where('employee_id', Auth::id())
            ->get(['department_id', 'project_id', 'subproject_id', 'date', 'start_time', 'end_time']);
    }

    public function headings(): array
    {
        return ['Department ID', 'Project ID', 'Subproject ID', 'Date', 'Start Time', 'End Time'];
    }
}
