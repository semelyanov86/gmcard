<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use App\ValueObjects\MoneyValueObject;

class Money
{
    public static function input(?string $name = null): TextInput
    {
        return TextInput::make($name)
            ->formatStateUsing(fn ($state) => self::formatMoneyState($state))
            ->dehydrateStateUsing(fn ($state) => self::dehydrateMoneyState($state))
            ->suffix('₽');
    }

    public static function column(?string $name = null): TextColumn
    {
        return TextColumn::make($name)
            ->formatStateUsing(fn ($state) => self::formatMoneyState($state));
    }

    private static function formatMoneyState($state): string
    {
        if (is_object($state) && method_exists($state, 'toDisplayValue')) {
            return $state->toDisplayValue();
        }

        if (is_object($state) && method_exists($state, 'toString')) {
            return $state->toString();
        }

        return (string) $state;
    }

    private static function dehydrateMoneyState($state): mixed
    {
        if (is_string($state)) {
            return MoneyValueObject::fromString($state);
        }

        return $state;
    }
}
