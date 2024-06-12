<?php

namespace App\Filament\Resources\CatPhotoResource\Pages;

use App\Filament\Resources\CatPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCatPhoto extends ViewRecord
{
    protected static string $resource = CatPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
