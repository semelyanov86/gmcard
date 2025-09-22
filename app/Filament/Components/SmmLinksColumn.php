<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Tables\Columns\TextColumn;

final class SmmLinksColumn
{
    public static function make(string $name): TextColumn
    {
        return TextColumn::make($name)
            ->formatStateUsing(fn ($state) => self::format($state, ', '))
            ->tooltip(fn ($state) => self::format($state, "\n", emptyText: null));
    }

    /**
     * @param  array<string,string>|string|null  $state
     */
    private static function format(mixed $state, string $separator, ?string $emptyText = '-'): ?string
    {
        if (! is_array($state)) {
            return is_string($state) ? $state : null;
        }

        if ($state === []) {
            return $emptyText;
        }

        return collect($state)
            ->map(fn (string $value, string $key) => sprintf('%s: %s', $key, $value))
            ->implode($separator);
    }
}
