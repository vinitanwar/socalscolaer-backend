<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Filament\Resources\AuthorResource\RelationManagers;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Editor';
    protected static ?string $modelLabel = 'Editor';
        protected static ?string $navigationGroup = 'Article';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->description('Primary author details')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    // ->unique()
                                    ->maxLength(255)
                                    ->columnSpan(2)
                                    ->prefixIcon('heroicon-o-user')
                                    ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-800']),

                                FileUpload::make('image')
                                    ->label('Profile Photo')
                                    ->image()
                                    ->directory('authors')
                                    ->imageEditor()
                                    ->circleCropper()
                                    ->imageResizeTargetWidth(400)
                                    ->imageResizeTargetHeight(400)
                                    ->alignCenter(),
                            ]),

                        Textarea::make('about_author')
                            ->label('Biography')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull()
                            ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-800'])
                            ->placeholder('Tell readers about this author...'),

                        Forms\Components\Section::make('Documents')
                            ->collapsible()
                            ->schema([
                                FileUpload::make('cv')
                                    ->label('Curriculum Vitae (PDF)')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->directory('author-cvs')
                                    ->preserveFilenames()
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('Maximum file size: 5MB')
                                      ->columnSpan(1),

Select::make('author_type')->label("Type")
    ->options([
        'editor' => 'Editor',
        'author' => 'Author',
        'advisory' => 'Advisory',
    ]) ->native(false) 
    ->selectablePlaceholder(false)
    ->prefixIcon('heroicon-o-user-circle')
    ->helperText('Select the user role')
    ->required()
  
   ,
  Toggle::make('inboard')
    ->label('Show In Board')
    ->inline()
    ->onColor('success')
    ->offColor('danger')
    ->onIcon('heroicon-o-check-circle')
    ->offIcon('heroicon-o-x-circle')
    ->hint('Toggle to show/hide in the board view')
    ->hintIcon('heroicon-o-information-circle')
    ->hintColor('primary')
    ->extraAttributes([
        'class' => 'rounded-full shadow-sm',
    ])



                            ]) ->columns(3),
                    ])
                    ->columns(3),
                    Repeater::make('links')
    ->schema([
    Select::make('platform')
        ->label('Platform')
        ->options([
            'instagram' => 'Instagram',
            'whatsapp'  => 'WhatsApp',
            'x'         => 'X (Twitter)',
            'linkedin'  => 'LinkedIn',
            'facebook'  => 'Facebook',
        ])
        ->required()
        ->native(false)
        ->columnSpan(1),

    TextInput::make('url')
        ->label('Profile URL')
        ->url()
        ->required()
        ->prefix('https://')
        ->columnSpan(1),
])->columns(2)
->label('Social Media Links')
->addActionLabel('Add Link')
->columnSpan('full')
->nullable(),

Toggle::make('showprofile')
    ->label('Show Profile')
    ->helperText('Enable to display this profile publicly.')
    ->inline()
    ->onColor('success')
    ->offColor('danger')
            ])
            ;

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('')
                    ->circular()
                    ->size(50)
                    ->grow(false),

                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->weight('medium')
                    ->description(fn ($record) => str($record->about_author)->limit(50))
                    ->wrap(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray'),

                Tables\Columns\IconColumn::make('cv')
                    ->label('CV')
                    ->icon(fn ($state) => $state ? 'heroicon-o-document-text' : 'heroicon-o-x-circle')
                    ->color(fn ($state) => $state ? 'success' : 'danger')
                    ->tooltip(fn ($state) => $state ? 'View CV' : 'No CV uploaded'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('name', 'desc')
            ->filters([
                Tables\Filters\Filter::make('has_cv')
                    ->label('Has CV')
                    ->query(fn (Builder $query) => $query->whereNotNull('cv')),

                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->icon('heroicon-o-eye'),
                        
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-o-pencil'),
                        
                    Tables\Actions\DeleteAction::make()
                        ->icon('heroicon-o-trash'),
                ])
                ->tooltip('Actions')
                ->button()
                ->color('gray')
                ->size('sm'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->icon('heroicon-o-trash'),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->icon('heroicon-o-trash'),
                    Tables\Actions\RestoreBulkAction::make()
                        ->icon('heroicon-o-arrow-uturn-left'),
                ]),
            ])
            ->emptyStateActions([
            //     Tables\Actions\CreateAction::make()
            //         ->label('New Author')
            //         ->icon('heroicon-o-plus'),
            ])
            ->striped()
            ->deferLoading()
            ->persistFiltersInSession()
            ->poll('10s');
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\BooksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     // return parent::getEloquentQuery()
    //         // ->withoutGlobalScopes([
    //         //     SoftDeletingScope::class,
    //         // ]);
    // }
}