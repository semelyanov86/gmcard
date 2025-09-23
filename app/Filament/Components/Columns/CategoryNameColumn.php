<?php

declare(strict_types=1);

namespace App\Filament\Components\Columns;

use App\Models\Category;
use Filament\Tables\Columns\TextColumn;

final class CategoryNameColumn
{
    public static function make(string $name = 'name'): TextColumn
    {
        return TextColumn::make($name)
            ->label('Name')
            ->formatStateUsing(function (string $state, Category $record): string {
                $path = CategoryPathColumn::pathOf($record);
                $depth = max(substr_count($path, '/'), 0);
                $indent = str_repeat('— ', $depth);
                return $indent . $state;
            })
            ->searchable();
    }
} 