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
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->limit(100),
                Money::column('price')
                    ->sortable(),
                Money::column('banner_price')
                    ->sortable(),
                TextColumn::make('ads_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
