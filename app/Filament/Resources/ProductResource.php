<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Main Information')
                ->collapsible()
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required(),
                    Forms\Components\TextInput::make('price')
                        ->required()
                        ->numeric()
                        ->prefix('$'),
                    Forms\Components\Textarea::make('description')
                        ->columnSpanFull(),
                ]),
                Forms\Components\Section::make('Sittings')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->searchable(true)
                            ->options(Category::pluck('name','category_id'))
                            ->required(),
                        Forms\Components\ToggleButtons::make('stock_status')
                            ->inline()
                            ->options([
                                'in_stock' => 'In stock',
                                'out_of_stock' => 'Out of stock',
                                'pre_order' => 'Pre-order'
                            ])
                            ->colors([
                                'in_stock' => 'info',
                                'out_of_stock' => 'warning',
                                'pre_order' => 'success',
                            ])
                            ->default('in_stock')
                            ->required(),
                        Forms\Components\Toggle::make('discounted')
                            ->inline(false)
                            ->required(),
                    ]),
                Forms\Components\Section::make('Images')
                    ->collapsible()
                    ->schema([
                        Forms\Components\FileUpload::make('image_url')
                            ->required()
                            ->disk('public')
                            ->directory('products')
                            ->uploadingMessage('Uploading image...')
                            ->maxSize(16384)
                            ->image(),
                        Forms\Components\FileUpload::make('additional_images')
                            ->multiple()
                            ->disk('public')
                            ->panelLayout('grid')
                            ->reorderable()
                            ->directory('products')
                            ->maxSize(16384)
                            ->uploadingMessage('Uploading additional images...')
                            ->maxFiles(10)
                            ->image(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_url'),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_status')
                    ->searchable(),
                Tables\Columns\IconColumn::make('discounted')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::all()->count();
    }
}
