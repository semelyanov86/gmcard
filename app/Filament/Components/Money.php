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
            ->formatStateUsing(fn (mixed $state) => self::formatMoneyState($state))
            ->dehydrateStateUsing(fn (mixed $state) => self::dehydrateMoneyState($state))
            ->suffix('₽');
    }

    public static function column(?string $name = null): TextColumn
    {
        return TextColumn::make($name)
            ->formatStateUsing(fn (mixed $state) => self::formatMoneyState($state));
    }

    private static function formatMoneyState(mixed $state): string
    {
        if (is_object($state) && method_exists($state, 'toDisplayValue')) {
            return $state->toDisplayValue();
        }

        if (is_object($state) && method_exists($state, 'toString')) {
            return $state->toString();
        }

        if (is_scalar($state) || $state === null) {
            return (string) $state;
        }

        return '';
    }

    private static function dehydrateMoneyState(mixed $state): mixed
    {
        if ($state === null || $state === '') {
            return MoneyValueObject::fromString('0');
        }

        if (is_string($state)) {
            return MoneyValueObject::fromString($state);
        }

        if (is_numeric($state)) {
            return MoneyValueObject::fromString((string) $state);
        }

        if ($state instanceof MoneyValueObject) {
            return $state;
        }

        return MoneyValueObject::fromString('0');
    }
}
