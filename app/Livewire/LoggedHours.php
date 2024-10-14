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
        return view('livewire.logged-hours', compact('logs'));
    }

    public function export()
    {
        // Call the export functionality using Maatwebsite Excel
        return Excel::download(new TimeLogsExport(auth()->id()), 'time_logs_' . date('Y-m-d_H-i-s') . '.xlsx');
    }
}
