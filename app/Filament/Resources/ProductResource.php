<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->label('Category'),
                Forms\Components\TextInput::make('variant')
                    ->required(),
                Forms\Components\TextInput::make('size')
                    ->required(),
                Forms\Components\TextInput::make('packaging')
                    ->required(),
                Forms\Components\TextInput::make('load_ability')
                    ->required(),
                Forms\Components\TextInput::make('shelf_life')
                    ->required(),
                Forms\Components\FileUpload::make('main_image')
                    ->label('Main Image')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('additional_images')
                    ->label('Additional Images')
                    ->multiple()
                    ->maxFiles(3)
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('variant')
                    ->sortable(),
                Tables\Columns\TextColumn::make('size'),
                Tables\Columns\TextColumn::make('packaging'),
                Tables\Columns\TextColumn::make('load_ability'),
                Tables\Columns\TextColumn::make('shelf_life'),
                Tables\Columns\ImageColumn::make('main_image')
                    ->label('Main Image'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Category'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
