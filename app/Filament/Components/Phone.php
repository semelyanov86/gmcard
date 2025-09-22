<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class Phone
{
    public static function input(?string $name = null): TextInput
    {
        return TextInput::make($name)
            ->tel()
            ->formatStateUsing(fn ($state) => (string) $state);
    }

    public static function column(?string $name = null): TextColumn
    {
        return TextColumn::make($name)
            ->formatStateUsing(fn ($state) => $state?->toE164())
            ->searchable();
    }
}
