<?php

namespace App\Filament\Resources\BlogtypeResource\Pages;

use App\Filament\Resources\BlogtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogtypes extends ListRecords
{
    protected static string $resource = BlogtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
