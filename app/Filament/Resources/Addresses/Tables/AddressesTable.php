<?php

declare(strict_types=1);

namespace App\Filament\Resources\Addresses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Components\Phone;
use Filament\Tables\Table;

final class AddressesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Адрес')
                    ->searchable(),
                Phone::column('phone')
                    ->label('Телефон'),
                Phone::column('phone_secondary')
                    ->label('Дополнительный телефон'),
                TextColumn::make('website')
                    ->label('Ссылка на сайт')
                    ->url(fn ($record) => $record->website ?: null, shouldOpenInNewTab: true)
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Дата обновления')
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
