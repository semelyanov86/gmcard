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
        $parts = [];
        $current = $record;
        for ($i = 0; $i < 32; $i++) {
            if ($current === null) {
                break;
            }
            $parts[] = $current->name;
            $current = $current->parent;
        }
        return implode(' / ', array_reverse($parts));
    }
} 