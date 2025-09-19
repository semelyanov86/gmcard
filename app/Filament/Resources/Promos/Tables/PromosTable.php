<?php

declare(strict_types=1);

namespace App\Filament\Resources\Promos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PromosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('type'),
                TextColumn::make('code')
                    ->searchable(),
                TextColumn::make('img')
                    ->searchable(),
                TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('video_link')
                    ->searchable(),
                TextColumn::make('smm_links')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return null;
                        $decoded = is_string($state) ? json_decode($state, true) : $state;
                        if (!is_array($decoded)) return $state;
                        return implode(', ', array_map(fn ($key, $value) => "$key: $value", array_keys($decoded), $decoded));
                    })
                    ->searchable(),
                TextColumn::make('availabe_from')
                    ->date()
                    ->sortable(),
                TextColumn::make('available_to')
                    ->time()
                    ->sortable(),
                TextColumn::make('started_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('available_till')
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('show_on_home')
                    ->boolean(),
                TextColumn::make('raise_on_top_hours')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('restart_after_finish_days')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sales_order_from')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('free_delivery_from')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('free_delivery')
                    ->boolean(),
                TextColumn::make('approved_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('crmid')
                    ->sortable(),
                TextColumn::make('advCampaign.name')
                    ->searchable(),
                TextColumn::make('organisation.name')
                    ->searchable(),
                TextColumn::make('discount')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
