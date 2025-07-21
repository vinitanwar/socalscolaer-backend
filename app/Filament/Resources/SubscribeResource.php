<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscribeResource\Pages;
use App\Filament\Resources\SubscribeResource\RelationManagers;
use App\Models\Subscribe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscribeResource extends Resource
{
    protected static ?string $model = Subscribe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')])
            ->filters([
                 Filter::make('Created Today')
        ->query(fn ($query) => $query->whereDate('created_at', now()->toDateString())),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscribes::route('/'),
            'create' => Pages\CreateSubscribe::route('/create'),
            'edit' => Pages\EditSubscribe::route('/{record}/edit'),
        ];
    }
}
