<?php

declare(strict_types=1);

namespace App\Filament\Resources\PromoUsages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PromoUsagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('promo.name')
                    ->label('Промо')
                    ->searchable(),
                TextColumn::make('used_at')
                    ->label('Использовано')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Пользователь')
                    ->searchable(),
                TextColumn::make('ip')
                    ->label('IP-адрес')
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
