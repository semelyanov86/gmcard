<?php

declare(strict_types=1);

namespace App\Filament\Resources\Categories\Tables;

use App\Filament\Components\Actions\CategoryCreateChildAction;
use App\Filament\Components\Columns\CategoryNameColumn;
use App\Filament\Components\Columns\CategoryPathColumn;
use App\Models\Category;
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
                CategoryNameColumn::make(),
                CategoryPathColumn::make(),
                IconColumn::make('is_starred')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
