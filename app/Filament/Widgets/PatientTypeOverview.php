<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Cats', Patient::query()->where('type', 'cat')->count())
            ->description('Cat Patiend Count')
            ->color('success')
            ->chart([14, 1, 10, 3, 20, 4, 25])
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Dogs', Patient::query()->where('type', 'dog')->count())
            ->description('Dog Patiend Count')
            ->color('success')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Rabbits', Patient::query()->where('type', 'rabbit')->count())
            ->description('Rabbits Patiend Count')
            ->color('success')
            ->chart([7, 2, 10, 20,2, 24, 40])
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
