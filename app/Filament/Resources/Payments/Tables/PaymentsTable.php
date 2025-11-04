<?php

declare(strict_types=1);

namespace App\Filament\Resources\Payments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Filament\Components\Money;

final class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('payment_date')
                    ->label('Дата платежа')
                    ->dateTime()
                    ->sortable(),
                Money::column('amount')
                    ->label('Сумма'),
                TextColumn::make('type')
                    ->label('Тип'),
                TextColumn::make('description')
                    ->label('Описание')
                    ->searchable(),
                TextColumn::make('transaction_id')
                    ->label('ID транзакции')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Пользователь')
                    ->searchable(),
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
