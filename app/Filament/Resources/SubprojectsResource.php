<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubprojectsResource\Pages;
use App\Filament\Resources\SubprojectsResource\RelationManagers;
use App\Models\Project;
use App\Models\Subproject;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubprojectsResource extends Resource
{
    protected static ?string $model = Subproject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('project_id')
                    ->label('Project')
                    ->options(Project::pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('name')->required()->placeholder('Enter Name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.name')
                    ->label('Project')
                    ->searchable()
                    ->sortable(), 
                TextColumn::make('name'),
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
            'index' => Pages\ListSubprojects::route('/'),
            'create' => Pages\CreateSubprojects::route('/create'),
            'edit' => Pages\EditSubprojects::route('/{record}/edit'),
        ];
    }
}
