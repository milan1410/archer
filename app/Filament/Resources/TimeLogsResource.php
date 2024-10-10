<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeLogsResource\Pages;
use App\Filament\Resources\TimeLogsResource\RelationManagers;
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

class TimeLogsResource extends Resource
{
    protected static ?string $model = TimeLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->options(User::where('role','employee')->pluck('name', 'id'))
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
                //
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
