<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Models\Address;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationLabel = 'Адреса';

    protected static ?int $navigationSort = 15;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')->label('Название')->required()->maxLength(255),
                TextInput::make('open_hours')->label('Часы работы')->maxLength(255)->nullable(),
                TextInput::make('phone')->label('Телефон')->maxLength(255)->nullable(),
                TextInput::make('phone_secondary')->label('Доп. телефон')->maxLength(255)->nullable(),
                TextInput::make('website')->label('Сайт')->maxLength(255)->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Название')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('open_hours')->label('Часы работы')->toggleable(),
                Tables\Columns\TextColumn::make('phone')->label('Телефон')->toggleable(),
                Tables\Columns\TextColumn::make('website')->label('Сайт')->toggleable(),
                Tables\Columns\TextColumn::make('organisations_count')->label('Организаций')->counts('organisations')->badge()->color('success'),
                Tables\Columns\TextColumn::make('created_at')->label('Создано')->dateTime('d.m.Y H:i')->sortable(),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
} 