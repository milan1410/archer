<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Project;
use App\Models\Subproject;
use App\Models\TimeLog;
use Carbon\Carbon;
use Livewire\Component;
use Filament\Forms;

class LogHoursForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $department_id, $project_id, $subproject_id, $date, $start_time, $end_time;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('department_id')
                ->label('Department')
                ->options(Department::pluck('name', 'id'))
                ->required()
                ->reactive(),

            Forms\Components\Select::make('project_id')
                ->label('Project')
                ->options(fn () => Project::where('department_id', $this->department_id)->pluck('name', 'id'))
                ->required()
                ->reactive(),

            Forms\Components\Select::make('subproject_id')
                ->label('Subproject')
                ->options(fn () => Subproject::where('project_id', $this->project_id)->pluck('name', 'id'))
                ->required(),

            Forms\Components\DatePicker::make('date')->required(),
            Forms\Components\TimePicker::make('start_time')->required(),
            Forms\Components\TimePicker::make('end_time')->required(),
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();
        $data['total_hours'] = Carbon::parse($data['end_time'])->diffInHours(Carbon::parse($data['start_time']));
        TimeLog::create($data + ['user_id' => auth()->id()]);
    }

    public function render()
    {
        return view('livewire.log-hours-form');
    }
}

