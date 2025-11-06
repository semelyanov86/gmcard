<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdvCampaigns\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class AdvCampaignsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Название кампании')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Описание')
                    ->searchable(),
                TextColumn::make('crmid')
                    ->label('Crm id')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('deeplink')
                    ->label('Ссылка на сайт')
                    ->searchable(),
                TextColumn::make('avg_hold_time')
                    ->searchable(),
                TextColumn::make('avg_money_transfer_time')
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
