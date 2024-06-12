<?php

namespace App\Filament\Widgets;

use App\Models\Person as ModelsPerson;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Person extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            stat::make("User" , ModelsPerson::query()->count())
        ];
    }
}
