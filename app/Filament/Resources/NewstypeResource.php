<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewstypeResource\Pages;
use App\Filament\Resources\NewstypeResource\RelationManagers;
use App\Models\Newstype;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class NewstypeResource extends Resource
{
    protected static ?string $model = Newstype::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';
 protected static ?string $navigationLabel = 'Article Types';
  protected static ?string $navigationGroup = 'Article';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('categories')
    ->label('Post Categories')
    ->placeholder('Enter comma-separated categories')
   
    ->hintIcon('heroicon-o-information-circle')
    ->required()
    ->maxLength(255)
    ->live(onBlur: true)
    ->columnSpan('full')
    ->extraInputAttributes(['class' => 'font-mono'])
    ->prefixIcon('heroicon-o-tag')
    ->suffixIcon('heroicon-o-plus')
    ->autocomplete('off')
    ->disabled(fn (string $operation): bool => $operation === 'edit')
    ->extraAttributes(['style' => 'border-radius: 0.5rem;'])
   

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              TextColumn::make('categories')->label("Categories")
            ->sortable()
            ->searchable()
            
            ])
            ->filters([
                //
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
            'index' => Pages\ListNewstypes::route('/'),
            'create' => Pages\CreateNewstype::route('/create'),
            'edit' => Pages\EditNewstype::route('/{record}/edit'),
        ];
    }
}
