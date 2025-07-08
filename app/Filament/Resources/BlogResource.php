<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Blogtype;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
            protected static ?string $navigationGroup = 'Blog';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('banner')
                    ->image()
                    // ->directory('blog-banners')
                    ->required(),
                    
                Forms\Components\Select::make('blog_cat')
                    ->options(Blogtype::pluck('blogtype', 'blogtype')->toArray())
                    ->required(),
                    
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true),
                    
               
                    
                Forms\Components\Select::make('blog_editor')
                    ->options(Author::pluck('name', 'name')->toArray())
                    ->required(),
                    
                Forms\Components\Repeater::make('blog_dis')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required(),
                            
                        Forms\Components\ColorPicker::make('title_color')
                            ->default('#000000'),
                            
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ,
                            
                        
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->addActionLabel('Add Content Block')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner')
                    ->square(),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('blog_cat')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'technology' => 'info',
                        'business' => 'success',
                        'health' => 'danger',
                        'entertainment' => 'warning',
                        default => 'gray',
                    }),
                    
                Tables\Columns\TextColumn::make('blog_editor')
                    ->badge(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('blog_cat')
                    ->options([
                        'technology' => 'Technology',
                        'business' => 'Business',
                        'health' => 'Health',
                        'entertainment' => 'Entertainment',
                    ]),
                    
                Tables\Filters\SelectFilter::make('blog_editor')
                    ->options([
                        'admin' => 'Admin',
                        'guest' => 'Guest Author',
                        'editor' => 'Editor',
                    ]),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}