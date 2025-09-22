<?php

declare(strict_types=1);

namespace App\Filament\Resources\Promos\Tables;

use App\Filament\Components\DaysAvailabilityColumn;
use App\Filament\Components\SmmLinksColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use App\Filament\Components\Money;

final class PromosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('code')
                    ->searchable(),
                TextColumn::make('img')
                    ->searchable(),
                Money::column('amount')
                    ->sortable(),
                TextColumn::make('video_link')
                    ->searchable(),
                SmmLinksColumn::make('smm_links')
                    ->searchable(),
                DaysAvailabilityColumn::make()
                    ->searchable(),
                TextColumn::make('availabe_from')
                    ->date()
                    ->sortable(),
                TextColumn::make('available_to')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('started_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('available_till')
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('show_on_home')
                    ->boolean()
                    ->sortable(),
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
                    ->boolean()
                    ->sortable(),
                TextColumn::make('approved_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('approving_notes')
                    ->searchable(),
                TextColumn::make('crmid')
                    ->searchable(),
                TextColumn::make('advCampaign.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('organisation.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('discount')
                    ->searchable(),
                TextColumn::make('created_at')
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
