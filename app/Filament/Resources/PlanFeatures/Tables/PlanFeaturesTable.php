<?php

declare(strict_types=1);

namespace App\Filament\Resources\PlanFeatures\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PlanFeaturesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->width(50),
                TextColumn::make('system_name')
                    ->label('Системное имя')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('display_name')
                    ->label('Отображаемое название')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Описание')
                    ->limit(80)
                    ->wrap(),
                TextColumn::make('tariff_plans_count')
                    ->label('Тарифов')
                    ->counts('tariffPlans')
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
            ->defaultSort('id', 'asc');
    }
}


