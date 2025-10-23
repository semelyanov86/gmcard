<?php

declare(strict_types=1);

namespace App\Filament\Resources\Menus\Tables;

use App\Enums\MenuType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('url')
                    ->label('URL')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('URL скопирован'),
                TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->color(fn (MenuType $state): string => $state->getColor())
                    ->formatStateUsing(fn (MenuType $state): string => $state->getLabel())
                    ->sortable(),
                TextColumn::make('order')
                    ->label('Порядок')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Тип меню')
                    ->options(MenuType::filterOptions()),
                SelectFilter::make('is_active')
                    ->label('Статус')
                    ->options([
                        '1' => 'Активные',
                        '0' => 'Неактивные',
                    ]),
            ])
            ->defaultSort('order')
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
