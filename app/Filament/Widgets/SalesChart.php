<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Artical Created per Month';

    protected function getData(): array
    {
        // Get news counts per month
        $newsCounts = News::query()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare labels and data
        $labels = [];
        $data = [];

        foreach ($newsCounts as $news) {
            $labels[] = Carbon::create()->month($news->month)->format('F');
            $data[] = $news->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total News Articles',
                    'data' => $data,
                    'borderColor' => '#3b82f6', // Tailwind blue-500
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Or 'bar', 'pie'
    }
}
