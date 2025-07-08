<?php

namespace App\Filament\Resources\NewstypeResource\Pages;

use App\Filament\Resources\NewstypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewstypes extends ListRecords
{
    protected static string $resource = NewstypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
