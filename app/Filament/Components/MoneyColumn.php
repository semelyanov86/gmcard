<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Tables\Columns\TextColumn;

class MoneyColumn extends TextColumn
{
    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->formatStateUsing(fn ($state) => is_object($state) && method_exists($state, 'toDisplayValue') ? $state->toDisplayValue() : (string) $state);
    }
}
