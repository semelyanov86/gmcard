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
                    ->sortable(),
                TextColumn::make('code')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sender.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('receiver.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type'),
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
