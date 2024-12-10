<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExhibitionResource\Pages;
use App\Models\Exhibition;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;

class ExhibitionResource extends Resource
{
    protected static ?string $model = Exhibition::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Exhibition Name')
                    ->required(),
                Forms\Components\TextInput::make('city')
                    ->required(),
                Forms\Components\TextInput::make('country')
                    ->required(),
                Forms\Components\Select::make('month')
                    ->options([
                        'January' => 'January',
                        'February' => 'February',
                        'March' => 'March',
                        'April' => 'April',
                        'May' => 'May',
                        'June' => 'June',
                        'July' => 'July',
                        'August' => 'August',
                        'September' => 'September',
                        'October' => 'October',
                        'November' => 'November',
                        'December' => 'December',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('year')
                    ->numeric()
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Exhibition Image')
                    ->image()
                    ->required()
                    ->directory('exhibitions/images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Exhibition Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('month'),
                Tables\Columns\TextColumn::make('year'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Exhibition Image'),
            ])
            ->filters([])
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
            'index' => Pages\ListExhibitions::route('/'),
            'create' => Pages\CreateExhibition::route('/create'),
            'edit' => Pages\EditExhibition::route('/{record}/edit'),
        ];
    }
}
