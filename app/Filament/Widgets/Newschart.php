<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class Newschart extends ChartWidget
{
    protected static ?string $heading = 'News Views This Month';

    protected function getData(): array
    {
        $now = now();
        
        // Get total views grouped by day for current month
        $newsViews = News::query()
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->selectRaw('DATE(created_at) as day, SUM(views) as total_views')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $labels = [];
        $data = [];

        foreach ($newsViews as $record) {
            $labels[] = Carbon::parse($record->day)->format('d M'); // e.g., 07 Jul
            $data[] = $record->total_views;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Views',
                    'data' => $data,
                    'backgroundColor' => '#60a5fa', // blue-400
                    'borderColor' => '#2563eb',     // blue-600
                    'borderWidth' => 2,
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // or 'bar'
    }
}
