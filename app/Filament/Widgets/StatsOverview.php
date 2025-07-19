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

                 Card::make('Total Artical Posted', \App\Models\News::count())
                ->description('All Artical')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('danger'),
                 Card::make('Total Blog Posted', \App\Models\Blog::count())
                ->description('All Blog')
                ->descriptionIcon('heroicon-o-bold')
                ->color('warning'),


            

        
        ];
    }
}





