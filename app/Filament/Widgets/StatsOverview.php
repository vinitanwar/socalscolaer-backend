<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Views this Month', \App\Models\News::whereMonth('created_at', Carbon::now()->month)
    ->whereYear('created_at', Carbon::now()->year)
    ->sum('views'))
                ->description('All Views')
                ->descriptionIcon('heroicon-o-eye')
                ->color('success'),

            // Card::make('New Users This Month', User::whereMonth('created_at', now()->month)->count())
            //     ->description('Growth this month')
            //     ->descriptionIcon('heroicon-o-arrow-trending-up')
            //     ->color('info'),

            // Card::make('Pending Orders', \App\Models\News::all()->count())
            //     ->description('Awaiting confirmation')
            //     ->descriptionIcon('heroicon-o-clock')
            //     ->color('warning'),
        ];
    }
}
