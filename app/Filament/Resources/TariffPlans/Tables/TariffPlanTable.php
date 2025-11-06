<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Components\Money;
use Filament\Tables\Table;

final class TariffPlanTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Слаг')
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Описание')
                    ->limit(100),
                Money::column('price')
                    ->label('Цена'),
                Money::column('banner_price')
                    ->label('Цена баннера'),
                TextColumn::make('ads_count')
                    ->label('Количество объявлений')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
