<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganisationResource\Pages;
use App\Models\Organisation;
use Filament\Forms\Components\Select;
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

class OrganisationResource extends Resource
{
    protected static ?string $model = Organisation::class;

    protected static ?string $navigationLabel = 'Организации';

    protected static ?int $navigationSort = 11;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')->label('Название')->required()->maxLength(255),
                TextInput::make('owner_role')->label('Роль владельца')->maxLength(255)->nullable(),
                TextInput::make('inn')->label('ИНН')->maxLength(255)->nullable(),
                TextInput::make('ogrn')->label('ОГРН')->maxLength(255)->nullable(),
                TextInput::make('contact')->label('Контакт')->maxLength(255)->nullable(),
                TextInput::make('contact_fio')->label('Контакт ФИО')->maxLength(255)->nullable(),
                Textarea::make('opening_hours')->label('Часы работы (JSON)')->rows(3)->nullable(),
                Select::make('user_id')->label('Владелец')->relationship('user', 'name')->searchable()->preload()->nullable(),
                Select::make('address_id')->label('Адрес')->relationship('address', 'name')->searchable()->preload()->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Название')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Владелец')->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('address.name')->label('Адрес')->toggleable(),
                Tables\Columns\TextColumn::make('promos_count')->label('Промо')->counts('promos')->badge()->color('success'),
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
            'index' => Pages\ListOrganisations::route('/'),
            'create' => Pages\CreateOrganisation::route('/create'),
            'edit' => Pages\EditOrganisation::route('/{record}/edit'),
        ];
    }
} 