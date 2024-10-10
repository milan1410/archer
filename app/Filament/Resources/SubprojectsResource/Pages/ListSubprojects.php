<?php

namespace App\Filament\Resources\SubprojectsResource\Pages;

use App\Filament\Resources\SubprojectsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubprojects extends ListRecords
{
    protected static string $resource = SubprojectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
