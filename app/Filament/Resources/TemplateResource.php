<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Spatie\Tags\Tag;
use App\Models\Template;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use RalphJSmit\Filament\SEO\SEO;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Yepsua\Filament\Forms\Components\Rating;
use Nuhel\FilamentCropper\Components\Cropper;
use Filament\Forms\Components\SpatieTagsInput;
use App\Filament\Resources\TemplateResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\TemplateResource\RelationManagers;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class TemplateResource extends Resource
{
    protected static ?string $model = Template::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Sub-Category')
                    ->schema([
                        Select::make('template_sub_category_id')
                            ->relationship('templateSubCategory', 'name')
                            ->required()
                            ->label('Sub-Category'),
                    ])
                    ->collapsed(),

                Section::make('Title, Note')
                    ->schema([
                        Fieldset::make('Title')
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                                            ->maxlength(50)
                                            ->reactive()

                                            ->afterStateUpdated(function (Closure $set, $state) {
                                                $set('slug', Str::slug($state));
                                            }),

                                        TextInput::make('slug')
                                            ->required()
                                            ->unique(ignoreRecord: true),
                                    ]),
                            ]),

                        Textarea::make('short')
                            ->required()
                            ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                            ->maxlength(200)
                            ->reactive()
                            ->rows(3),

                        Textarea::make('note')
                            ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                            ->maxlength(100)
                            ->reactive()
                            ->rows(2),
                    ])
                    ->collapsed(),

                Section::make('Details')
                    ->schema([
                        Fieldset::make('Type')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Select::make('type')
                                            ->options([
                                                'new' => 'New',
                                                'free' => 'Free',
                                                'premium' => 'Premium',
                                                'special' => 'Special',
                                                'unique' => 'Unique',
                                            ]),

                                        Rating::make('rating')
                                            ->required()
                                            ->min(1)
                                            ->max(5)
                                            ->effects(false)
                                            ->options([
                                                'Poor',
                                                'Acceptable',
                                                'Good',
                                                'Very Good',
                                                'Excellent',
                                            ]),

                                        TextInput::make('old_price'),

                                        TextInput::make('new_price'),
                                    ]),
                            ]),

                        Fieldset::make('Interface')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('responsive')
                                            ->required(),

                                        TextInput::make('interface')
                                            ->required(),

                                        TextInput::make('framework')
                                            ->required(),

                                        TextInput::make('document')
                                            ->required(),
                                    ]),
                            ]),

                        Fieldset::make('Files')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('browser')
                                            ->required(),

                                        TextInput::make('blocks')
                                            ->required(),
                                    ]),

                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('files')
                                            ->required(),

                                        Textarea::make('versions')
                                            ->required()
                                            ->rows(2),
                                    ]),
                            ]),

                        Fieldset::make('Source')
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('preview')
                                            ->required(),

                                        TextInput::make('source_url')
                                            ->required(),

                                        Cropper::make('source_logo')
                                            ->label('Source Logo')
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("template/source/thumb" . $file->hashName());
                                            })->enableDownload()
                                            ->enableOpen()
                                            ->required()
                                            ->enableImageRotation()
                                            ->enableImageFlipping()
                                            ->zoomable(true)
                                            ->enableZoomButtons()
                                            ->imageCropAspectRatio('1:1')
                                            ->imageResizeTargetWidth('100')
                                            ->imageResizeTargetHeight('100'),
                                    ]),
                            ]),

                    ])
                    ->collapsed(),

                Section::make('Description')
                    ->schema([
                        TinyEditor::make('desc')
                            ->required()
                            ->columnSpan(2)
                            ->label('Description')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsDirectory('template/desc'),
                    ])
                    ->collapsed(),

                Section::make('Thumbnail')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Card::make()
                                    ->schema([
                                        Cropper::make('thumb')
                                            ->label('Template Thumbnail')
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("template/thumb/thumb" . $file->hashName());
                                            })->enableDownload()
                                            ->enableOpen()
                                            ->required()
                                            ->enableImageRotation()
                                            ->enableImageFlipping()
                                            ->zoomable(true)
                                            ->enableZoomButtons()
                                            ->imageCropAspectRatio('4:5')
                                            ->imageResizeTargetWidth('370')
                                            ->imageResizeTargetHeight('470'),
                                    ]),

                                Card::make()
                                    ->schema([
                                        Cropper::make('image')
                                            ->label('Template Image')
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("template/image/image" . $file->hashName());
                                            })->enableDownload()
                                            ->enableOpen()
                                            ->required()
                                            ->enableImageRotation()
                                            ->enableImageFlipping()
                                            ->zoomable(true)
                                            ->enableZoomButtons()
                                            ->imageCropAspectRatio('2:1')
                                            ->imageResizeTargetWidth('770')
                                            ->imageResizeTargetHeight('399'),
                                    ]),
                            ]),
                    ])
                    ->collapsed(),

                Section::make('ScreenShots')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('slider')
                            ->multiple()
                            ->directory('template/slider')
                            ->collection('sliders')
                            ->label('Multiple Screenshots')
                            ->enableReordering()
                            ->enableOpen()
                            ->enableDownload(),
                    ])
                    ->collapsed(),

                Section::make('Tags')
                    ->schema([
                        SpatieTagsInput::make('tags')
                            ->type('template')
                            ->separator(','),
                    ])
                    ->collapsed(),

                Section::make('SEO')
                    ->schema([
                        SEO::make(),
                    ])
                    ->collapsed(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumb')
                    ->label('Thumbnail'),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('templateSubCategory.name')
                    ->label('Sub-Category')
                    ->sortable()
                    ->toggleable()
                    ->searchable()
                    ->wrap(),

                BadgeColumn::make('type')
                    ->enum([
                        'new' => 'New',
                        'free' => 'Free',
                        'premium' => 'Premium',
                        'special' => 'Special',
                        'unique' => 'Unique',
                    ])
                    ->colors([
                        'secondary' => static fn ($state): bool => $state === 'new',
                        'success' => static fn ($state): bool => $state === 'free',
                        'danger' => static fn ($state): bool => $state === 'premium',
                        'primary' => static fn ($state): bool => $state === 'special',
                        'warning' => static fn ($state): bool => $state === 'unique',
                    ]),

                IconColumn::make('status')
                    ->boolean()
                    ->toggleable()
                    ->sortable()
                    ->toggle(),

                TextColumn::make('updated_at')
                    ->since()
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->color('primary')
                    ->size('sm')
                    ->label('Updated'),
            ])
            ->filters([
                SelectFilter::make('template_sub_category_id')
                    ->relationship('templateSubCategory', 'name')
                    ->label('Filter By Sub-Category'),

                SelectFilter::make('tags')
                    ->multiple()
                    ->options(Tag::getWithType('template')->pluck('name', 'name'))
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['values'], function (Builder $query, $data): Builder {
                            return $query->withAnyTags(array_values($data), 'template');
                        });
                    })
                    ->label('Filter By Tags'),

                SelectFilter::make('status')
                    ->options([
                        '1' => 'Activated',
                        '0' => 'Deactivated',
                    ])
                    ->label('Filter By Status'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTemplates::route('/'),
            'create' => Pages\CreateTemplate::route('/create'),
            'edit' => Pages\EditTemplate::route('/{record}/edit'),
        ];
    }
}
