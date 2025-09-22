<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Forms\Components\TextInput;

final class Password
{
    public static function make(string $name = 'password'): TextInput
    {
        return TextInput::make($name)
            ->password()
            ->revealable()
            ->required(fn (string $context): bool => $context === 'create')
            ->minLength(8)
            ->rule('min:8')
            ->dehydrated(fn (?string $state): bool => filled($state));
    }
} 