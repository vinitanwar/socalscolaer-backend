<?php

    namespace App\Filament\Resources;
    use App\Filament\Resources\NewsResource\Pages;

    use App\Models\News;
    use App\Models\Author;
    use App\Models\Newstype;
    use Filament\Forms;
    use Filament\Forms\Components\{TextInput,FileUpload,Select,ColorPicker,Repeater, RichEditor};
    use Filament\Forms\Form;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Filament\Resources\Resource;
    use Filament\Tables\Columns\ImageColumn;
    use Illuminate\Support\HtmlString;

    class NewsResource extends Resource
    {
        protected static ?string $model = News::class;
        protected static ?string $navigationIcon = 'heroicon-o-newspaper';
        protected static ?string $navigationLabel = 'Articles';
        protected static ?string $navigationGroup = 'Article';
        protected static ?string $modelLabel = 'News Article';
        protected static ?int $navigationSort = 2;

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Section::make('Article Details')
                        ->description('Basic information about the news')
                        ->collapsible()
                        ->schema([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    TextInput::make('title')
                                        ->required()
                                        ->maxLength(255)
                                        // ->columnSpan(1.5)
                                        ->placeholder('Breaking News...')
                                        ->prefixIcon('heroicon-o-newspaper')
                                        ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-800']),


                                        TextInput::make('slug')
                                       ->maxLength(255)
                                        // ->columnSpan(1.5)
                                        ->placeholder('Breaking News...')
                                        ->prefixIcon('heroicon-o-newspaper')
                                        ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-800']),

                                    FileUpload::make('image')
                                        ->label('Banner Image')
                                        ->image()
                                        ->imageEditor()
                                                                            ->required()

                                        ->imageResizeTargetWidth(1200)
                                        ->imageResizeTargetHeight(630)
                                        ->alignCenter(),
                                ]),

                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Select::make('news_type')
                                        ->label('Category')
                                        ->options(Newstype::pluck('categories', 'categories')->toArray())
                                        ->searchable()
                                        ->required()
                                        ->placeholder('Select category...')
                                        ->prefixIcon('heroicon-o-tag'),

                                    Select::make('editor')
                                        ->label('Author')
                                        ->options(['0' => 'No Author'] + Author::pluck('name', 'name')->toArray())

                                        ->searchable()
                                        ->nullable()
                                        ->placeholder('Select author...')
                                        ->prefixIcon('heroicon-o-user'),
                                ]),
                                Forms\Components\Grid::make(3)
                                ->schema([
                                    ColorPicker::make('color')
                                ->label('Accent Color')
                                ->default('#3B82F6')
                                // ->width('full')
                                ->helperText('Used for UI elements related to this news'),

                                    Select::make('region')
                                        ->label('Region')
                                        ->options(["National","International"])
                                        ->searchable()
                                        ->nullable()
                                        ->placeholder('Select News Region...')
                                        ->prefixIcon('heroicon-o-paper-airplane'),
                                        TextInput::make("readingtime")->label("Reading time")
                                         ->placeholder('Reading time in minutes')->prefixIcon('heroicon-s-clock'),
                                ]),



                                Forms\Components\Grid::make(2)
                                ->schema([
                                    // FileUpload::make('allimages')
                                    //     ->label('All Artical Image')
                                    //     ->image()
                                    //     ->imageEditor()
                                    
                                    //     ->imageResizeTargetWidth(1200)
                                    //     ->imageResizeTargetHeight(630)
                                    //     ->alignCenter()->multiple(),
                                        
                            Select::make('numbering')
    ->label('Numbering')
    ->options([
        'first' => 'First',
        'second' => 'Second',
        'third' => 'Third',
    ])
    ->nullable()
    ->reactive()
    ->afterStateUpdated(function ($state, $set, $get, $livewire) {
        if ($state) {
            \App\Models\News::where('numbering', $state)
                ->where('id', '!=', $get('id'))
                ->update(['numbering' => null]);
        }
    }),
                                ]),












                            Forms\Components\Section::make('Content Sections')
                                ->description('Build your article with multiple sections')
                                ->collapsible()
                                ->schema([
                                    Repeater::make('des')
                                        ->label('')
                                        ->addActionLabel('Add New Section')
                                        ->collapsible()
                                        ->itemLabel(fn (array $state): ?string => $state['heading'] ?? null)
                                        ->schema([
                                            TextInput::make('heading')
                                                ->label('Section Heading')
                                                ->placeholder('Enter section title...')
                                                ->required()
                                                ->columnSpan(1)
                                                ->maxLength(100),

                                            ColorPicker::make('headingColor')
                                                ->label('Heading Color')
                                                ->default('#1E40AF')
                                                ->columnSpan(1),

                                            RichEditor::make('description')
                                                ->label('Content')
                                                ->required()
                                              ->columnSpan(1)
                                                ->fileAttachmentsDirectory('news-attachments')
                                                ->toolbarButtons([
                                                    'blockquote',
                                                    'bold',
                                                    'bulletList',
                                                    'codeBlock',
                                                    'h2',
                                                    'h3',
                                                    'italic',
                                                    'link',
                                                    'orderedList',
                                                    'redo',
                                                    'strike',
                                                    'underline',
                                                    'undo',
                                                ]),

                               FileUpload::make('img')->label("Select Image")
                               ->image()->columnSpan(1)->multiple(),



                                        ])
                                        ->columns(2)
                                        ->grid(1),
                                ]),
                        ])
                        ->columns(1),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    ImageColumn::make('image')
                        ->label('')
                        ->size(50)
                        ->circular()
                        ->grow(false),

                    Tables\Columns\TextColumn::make('title')
                        ->searchable()
                        ->sortable()
                        ->weight('medium')
                        ->description(fn ($record) => str($record->news_type)->limit(30))
                        ->wrap(),

                    Tables\Columns\TextColumn::make('editor')
                        ->label('Author')
                        ->badge()
                        ->color('gray')
                        ->searchable(),


                      Tables\Columns\TextColumn::make('views')
    ->label('Views Count')  // More descriptive label
    ->numeric()  // Adds right alignment and proper number formatting
    ->badge()
    ->color(fn (string $state): string => match (true) {
        $state > 1000 => 'success', 
        $state > 500 => 'warning',   
        default => 'danger',         
    })
   ,

                    Tables\Columns\TextColumn::make('des')
                        ->label('Sections')
                        ->badge()
                        ->color(fn ($state) => count($state) > 3 ? 'success' : 'warning')
                        ->formatStateUsing(fn ($state) => count($state) . ' ' . str('section')->plural(count($state))),

                    Tables\Columns\ColorColumn::make('color')
                        ->label('Color')
                        ->copyable()
                        ->copyMessage('Color code copied!'),

                    Tables\Columns\TextColumn::make('created_at')
                        ->label('Published')
                        ->dateTime('M d, Y')
                        ->sortable(),
                ])
                ->defaultSort('created_at', 'desc')
                ->filters([
                    Tables\Filters\SelectFilter::make('news_type')
                        ->options(Newstype::pluck('categories', 'categories')->toArray())
                        ->label('Filter by Category'),

                    Tables\Filters\SelectFilter::make('editor')
                        ->options(Author::pluck('name', 'name')->toArray())
                        ->searchable()
                        ->label('Filter by Author'),
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
                    ]),
                ])
                ->emptyStateActions([
                    Tables\Actions\CreateAction::make()
                        ->label('New News Article')
                        ->icon('heroicon-o-plus'),
                ])
                ->striped()
                ->deferLoading();
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
                'index' => Pages\ListNews::route('/'),
                'create' => Pages\CreateNews::route('/create'),
                'edit' => Pages\EditNews::route('/{record}/edit'),
            ];
        }
    }