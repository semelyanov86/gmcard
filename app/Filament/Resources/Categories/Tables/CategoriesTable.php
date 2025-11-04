<?php

declare(strict_types=1);

namespace App\Filament\Resources\Categories\Tables;

use App\Filament\Components\Actions\CategoryCreateChildAction;
use App\Filament\Components\Columns\CategoryNameColumn;
use App\Filament\Components\Columns\CategoryPathColumn;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                CategoryNameColumn::make()
                    ->label('Название'),
                CategoryPathColumn::make()
                    ->label('Путь'),
                IconColumn::make('is_starred')
                    ->label('Избранное')
                    ->boolean(),
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
            ->defaultSort('parent_id')
            ->recordActions([
                EditAction::make(),
                CategoryCreateChildAction::make(),
            ]);
    }
}
