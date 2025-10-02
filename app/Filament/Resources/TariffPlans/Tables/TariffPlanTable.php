<?php

declare(strict_types=1);

namespace App\Filament\Resources\TariffPlans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Components\Money;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('description')
                    ->limit(100),
                Money::column('price')
                    ->numeric()
                    ->sortable(),
                Money::column('banner_price')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('ads_count')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('users_count')
                    ->counts('users')
                    ->sortable()
                    ->badge()
                    ->color('success'),
                TextColumn::make('created_at')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('with_banner_price')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('banner_price')),
                Filter::make('without_banner_price')
                    ->query(fn (Builder $query): Builder => $query->whereNull('banner_price')),
                SelectFilter::make('ads_count_range')
                    ->options([
                        '0' => '0',
                        '1-10' => '1-10',
                        '11-50' => '11-50',
                        '51+' => '51+',
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return match ($data['value'] ?? null) {
                            '0' => $query->where('ads_count', 0),
                            '1-10' => $query->whereBetween('ads_count', [1, 10]),
                            '11-50' => $query->whereBetween('ads_count', [11, 50]),
                            '51+' => $query->where('ads_count', '>', 50),
                            default => $query,
                        };
                    }),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
