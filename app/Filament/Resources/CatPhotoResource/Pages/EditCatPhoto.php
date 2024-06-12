<?php

namespace App\Filament\Resources\CatPhotoResource\Pages;

use App\Filament\Resources\CatPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCatPhoto extends EditRecord
{
    protected static string $resource = CatPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
