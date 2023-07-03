<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use RalphJSmit\Filament\SEO\SEO;
use App\Models\TemplateSubCategory;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TemplateSubCategoryResource\Pages;
use App\Filament\Resources\TemplateSubCategoryResource\RelationManagers;

class TemplateSubCategoryResource extends Resource
{
    protected static ?string $model = TemplateSubCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Sub-Categories';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('template_category_id')
                                    ->required()
                                    ->relationship('templateCategory', 'name')
                                    ->label('Category'),

                                TextInput::make('name')
                                    ->reactive()
                                    ->required()
                                    ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                                    ->maxlength(50)
                                    ->afterStateUpdated(function (Closure $set, $state) {
                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                            ]),
                    ])
                    ->columnspan('full'),

                Section::make('SEO')
                    ->schema([
                        SEO::make(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('templateCategory.name')
                    ->label('Category')
                    ->sortable()
                    ->toggleable()
                    ->searchable()
                    ->wrap(),

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
                SelectFilter::make('template_category_id')
                    ->relationship('templateCategory', 'name')
                    ->label('Filter By Category'),

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
            'index' => Pages\ListTemplateSubCategories::route('/'),
            'create' => Pages\CreateTemplateSubCategory::route('/create'),
            'edit' => Pages\EditTemplateSubCategory::route('/{record}/edit'),
        ];
    }
}
