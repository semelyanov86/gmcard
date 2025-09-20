<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Forms\Components\TextInput;
use App\ValueObjects\MoneyValueObject;

class MoneyInput extends TextInput
{
    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->formatStateUsing(fn ($state) => is_object($state) && method_exists($state, 'toString') ? $state->toString() : (string) $state)
            ->dehydrateStateUsing(fn ($state) => is_string($state) ? MoneyValueObject::fromString($state) : $state)
            ->suffix('₽');
    }
}
