<?php

namespace App\Filament\Resources\CatPhotoResource\Pages;

use App\Filament\Resources\CatPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCatPhoto extends CreateRecord
{
    protected static string $resource = CatPhotoResource::class;
}
