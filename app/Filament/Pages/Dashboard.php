<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\Order;
use Filament\Pages\Page;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = '';

    protected function getHeaderWidgets(): array
    {
        return [
            
        ];
    }
}