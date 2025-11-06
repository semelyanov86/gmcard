<?php

declare(strict_types=1);

namespace App\Filament\Resources\Organisations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class OrganisationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('address.name')
                    ->label('Адрес')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                TextColumn::make('owner_role')
                    ->label('Роль владельца'),
                TextColumn::make('inn')
                    ->label('ИНН')
                    ->searchable(),
                TextColumn::make('ogrn')
                    ->label('ОГРН')
                    ->searchable(),
                TextColumn::make('contact')
                    ->label('Контакт')
                    ->searchable(),
                TextColumn::make('contact_fio')
                    ->label('ФИО контакта')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Пользователь')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
