<?php

declare(strict_types=1);

namespace App\Filament\Components\Columns;

use App\Models\Category;
use Filament\Tables\Columns\TextColumn;

final class CategoryPathColumn
{
    public static function make(string $name = 'path'): TextColumn
    {
        return TextColumn::make($name)
            ->label('Path')
            ->state(fn (Category $record): string => self::pathOf($record))
            ->sortable(false);
    }

    public static function pathOf(Category $record): string
    {
        $ancestors = $record->getAncestors();
        $parts = $ancestors->pluck('name')->toArray();
        $parts[] = $record->name;

        return implode(' / ', $parts);
    }
}
