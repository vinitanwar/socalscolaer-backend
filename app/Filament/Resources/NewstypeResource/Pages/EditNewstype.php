<?php

namespace App\Filament\Resources\NewstypeResource\Pages;

use App\Filament\Resources\NewstypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewstype extends EditRecord
{
    protected static string $resource = NewstypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
