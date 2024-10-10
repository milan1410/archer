<?php

namespace App\Livewire;

use App\Models\TimeLog;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TimeLogList extends Component
{
    public $timeLogs;

    public function mount()
    {
        $this->timeLogs = TimeLog::with('subproject.project.department')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function render()
    {
        return view('livewire.time-log-list', [
            'timeLogs' => $this->timeLogs,
        ]);
    }
}
