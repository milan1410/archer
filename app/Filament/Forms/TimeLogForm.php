<?php

namespace App\Filament\Forms;

use App\Models\Department;
use App\Models\Project;
use App\Models\Subproject;
use Filament\Forms;
use Filament\Forms\Form;

class TimeLogForm extends Form
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('department_id')
                    ->label('Department')
                    ->options(Department::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn (callable $set) => $set('project_id', null)),

                Forms\Components\Select::make('project_id')
                    ->label('Project')
                    ->options(function (callable $get) {
                        $departmentId = $get('department_id');
                        if (!$departmentId) {
                            return [];
                        }
                        return Project::where('department_id', $departmentId)->pluck('name', 'id');
                    })
                    ->searchable()
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn (callable $set) => $set('subproject_id', null)),

                Forms\Components\Select::make('subproject_id')
                    ->label('Subproject')
                    ->options(function (callable $get) {
                        $projectId = $get('project_id');
                        if (!$projectId) {
                            return [];
                        }
                        return Subproject::where('project_id', $projectId)->pluck('name', 'id');
                    })
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('date')
                    ->required(),

                Forms\Components\TimePicker::make('start_time')
                    ->required(),

                Forms\Components\TimePicker::make('end_time')
                    ->required(),
            ]);
    }
}