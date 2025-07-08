<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogtypeResource\Pages;
use App\Filament\Resources\BlogtypeResource\RelationManagers;
use App\Models\Blogtype;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogtypeResource extends Resource
{
    protected static ?string $model = Blogtype::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            
->schema([
    TextInput::make('blogtype')
        ->label('Blog Type')
        ->required()
        ->placeholder('Enter blog category name')
        ->prefixIcon('heroicon-o-pencil-square')
        ->helperText('This will appear as the category title.')
        ->columnSpanFull(),

    FileUpload::make('blogtypeimage')
        ->label('Blog Type Image')
        ->image()   // optional image ratio
        ->panelLayout('compact')    // better UI layout
        ->preserveFilenames()
        ->required()
        ->helperText('Upload a category image. Preferred size: 600x400px.')
        ->directory('blogtypes')
        ->columnSpanFull(),
])
->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make("blogtype")->label("Blog type"),
               ImageColumn::make("blogtypeimage")->label("image")
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
            'index' => Pages\ListBlogtypes::route('/'),
            'create' => Pages\CreateBlogtype::route('/create'),
            'edit' => Pages\EditBlogtype::route('/{record}/edit'),
        ];
    }
}
