<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Checkout;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CheckoutResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CheckoutResource\RelationManagers;

class CheckoutResource extends Resource
{
    protected static ?string $model = Checkout::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Select::make('template_id')
                                    ->relationship('template', 'title')
                                    ->required()
                                    ->label('Template'),
                            ]),

                    ])
                    ->columnspan('full'),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('cname')
                                    ->label('Name')
                                    ->required(),

                                TextInput::make('cphone')
                                    ->label('Phone')
                                    ->required(),

                                TextInput::make('cemail')
                                    ->label('Email')
                                    ->required(),

                                TextInput::make('cwhatsapp')
                                    ->label('Whatsapp')
                                    ->required(),
                            ]),

                    ])
                    ->columnspan('full'),

                Card::make()
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Textarea::make('cdesc')
                                    ->label('Description')
                                    ->required()
                                    ->rows(8)
                                    ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                                    ->maxlength(500)
                                    ->reactive(),
                            ]),

                    ])
                    ->columnspan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('template.title')
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('cname')
                    ->label('Name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('cphone')
                    ->label('Phone')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

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
                SelectFilter::make('template_id')
                    ->relationship('template', 'title')
                    ->label('Filter By Template'),
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
            'index' => Pages\ListCheckouts::route('/'),
            'create' => Pages\CreateCheckout::route('/create'),
            'edit' => Pages\EditCheckout::route('/{record}/edit'),
        ];
    }
}
