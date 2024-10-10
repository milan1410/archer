<?php

namespace App\Livewire;
use App\Models\Department;
use App\Models\Project;
use App\Models\Subproject;
use App\Models\TimeLog;
use Filament\Forms;
use Livewire\Component;
use Filament\Forms\Components\{Select, DatePicker, TimePicker};
use Illuminate\Support\Facades\Auth;

class TimeLogForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $department_id;
    public $project_id;
    public $subproject_id;
    public $date;
    public $start_time;
    public $end_time;

    protected function getFormSchema(): array
    {
        return [
            Select::make('department_id')
                ->label('Department')
                ->options(Department::all()->pluck('name', 'id'))
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->reset('project_id', 'subproject_id')),

            Select::make('project_id')
                ->label('Project')
                ->options(fn (callable $get) => Project::where('department_id', $get('department_id'))->pluck('name', 'id'))
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->reset('subproject_id'))
                ->required(),

            Select::make('subproject_id')
                ->label('Subproject')
                ->options(fn (callable $get) => Subproject::where('project_id', $get('project_id'))->pluck('name', 'id'))
                ->required(),

            DatePicker::make('date')->required(),

            TimePicker::make('start_time')->required(),
            TimePicker::make('end_time')->required(),
        ];
    }

    public function submit()
    {
        $validatedData = $this->form->getState();

        $start = \Carbon\Carbon::parse($validatedData['start_time']);
        $end = \Carbon\Carbon::parse($validatedData['end_time']);
        $totalHours = $start->diffInHours($end);

        TimeLog::create([
            'user_id' => Auth::id(),
            'subproject_id' => $validatedData['subproject_id'],
            'date' => $validatedData['date'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
            'total_hours' => $totalHours,
        ]);

        $this->form->reset();
        session()->flash('message', 'Time log saved successfully!');
    }

    public function render()
    {
        return view('livewire.time-log-form');
    }
}
