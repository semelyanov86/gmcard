<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bonuses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Filament\Components\Money;

final class BonusesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Money::column('amount')
                    ->label('Сумма'),
                TextColumn::make('code')
                    ->label('Код')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sender.name')
                    ->label('Отправитель')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('receiver.name')
                    ->label('Получатель')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Тип'),
                TextColumn::make('created_at')
                    ->label('Создано')
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
