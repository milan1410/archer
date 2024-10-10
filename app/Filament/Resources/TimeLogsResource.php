<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeLogsResource\Pages;
use App\Filament\Resources\TimeLogsResource\RelationManagers;
use App\Models\Subproject;
use App\Models\TimeLog;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\DateRangeFilter;
use App\Models\Department;
use App\Models\Project;
use Filament\Tables\Filters\Filter;
use Carbon\Carbon;

class TimeLogsResource extends Resource
{
    protected static ?string $model = TimeLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('subproject_id')
                    ->label('Sub Project')
                    ->options(Subproject::pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('user_id')
                    ->label('User')
                    ->options(User::where('role', 'employee')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                DatePicker::make('date')
                    ->required()
                    ->label('Date'),

                TimePicker::make('start_time')
                    ->required()
                    ->label('Start Time'),

                TimePicker::make('end_time')
                    ->required()
                    ->label('End Time'),

                TextInput::make('total_hours')
                    ->required()
                    ->numeric()
                    ->label('Total Hours')
                    ->placeholder('Enter total hours'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subproject.name')
                    ->label('Subproject')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date')
                    ->date()
                    ->sortable(),

                TextColumn::make('start_time')
                    ->time()
                    ->sortable(),

                TextColumn::make('end_time')
                    ->time()
                    ->sortable(),

                TextColumn::make('total_hours')
                    ->numeric(2)
                    ->sortable(),
            ])
            ->filters([
                // Filter by Employee (User)
                SelectFilter::make('user_id')
                    ->label('Employee')
                    ->options(User::where('role', 'employee')->pluck('name', 'id')->toArray())
                    ->searchable(),

                // Filter by Department
                SelectFilter::make('department_id')
                    ->label('Department')
                    ->options(Department::pluck('name', 'id')->toArray()) // Fetch directly from department table
                    ->query(function ($query, $data) {
                        if ($data['value']) {
                            $query->whereHas('subproject.project.department', function ($q) use ($data) {
                                $q->where('id', $data['value']);
                            });
                        }
                    })            
                    ->searchable(),

                // Filter by Project
                SelectFilter::make('project_id')
                    ->label('Project')
                    ->options(Project::pluck('name', 'id')->toArray()) // Fetch directly from project table
                    ->query(function ($query, $data) {
                        if ($data['value']) {
                            $query->whereHas('subproject.project', function ($q) use ($data) {
                                $q->where('id', $data['value']);
                            });
                        }
                    })            
                    ->searchable(),

                // Filter by Subproject
                SelectFilter::make('subproject_id')
                    ->label('Subproject')
                    ->options(Subproject::pluck('name', 'id')->toArray())
                    ->searchable(),

                // Custom Date Range Filter
                Filter::make('date_range')
                    ->label('Date Range')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')->label('Start Date'),
                        Forms\Components\DatePicker::make('end_date')->label('End Date'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if ($data['start_date'] ?? null) {
                            $query->where('date', '>=', Carbon::parse($data['start_date']));
                        }

                        if ($data['end_date'] ?? null) {
                            $query->where('date', '<=', Carbon::parse($data['end_date']));
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }




    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTimeLogs::route('/'),
            'create' => Pages\CreateTimeLogs::route('/create'),
            'edit' => Pages\EditTimeLogs::route('/{record}/edit'),
        ];
    }
}
