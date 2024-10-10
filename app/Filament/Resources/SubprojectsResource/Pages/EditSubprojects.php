<?php

namespace App\Filament\Resources\SubprojectsResource\Pages;

use App\Filament\Resources\SubprojectsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubprojects extends EditRecord
{
    protected static string $resource = SubprojectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
