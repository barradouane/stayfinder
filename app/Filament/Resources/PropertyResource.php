<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Biens'; // libellé dans le menu admin
    protected static ?string $modelLabel = 'Bien';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Titre du bien')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('description')
                    ->label('Description')
                    ->required(),

                TextInput::make('price_per_night')
                    ->label('Prix par nuit (€)')
                    ->numeric()
                    ->required(),

                FileUpload::make('image')
                    ->label('Image principale')
                    ->image()
                    ->directory('properties')
                    ->disk('public')
                    ->maxSize(1024),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Visuel')
                    ->disk('public')
                    ->square(),

                TextColumn::make('name')
                    ->label('Nom')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('price_per_night')
                    ->label('Tarif')
                    ->money('eur'),
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
            'index'  => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit'   => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
