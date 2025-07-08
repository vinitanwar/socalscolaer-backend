<?php

namespace App\Filament\Resources\BlogtypeResource\Pages;

use App\Filament\Resources\BlogtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogtype extends EditRecord
{
    protected static string $resource = BlogtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
