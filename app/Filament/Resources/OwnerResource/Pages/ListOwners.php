<?php

namespace App\Filament\Resources\OwnerResource\Pages;

use App\Filament\Resources\OwnerResource;
use App\Filament\Widgets\PatientTypeOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOwners extends ListRecords
{
    protected static string $resource = OwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getFooterWidgets(): array
    {
        return[
                PatientTypeOverview::class,
        ];
    }
}
