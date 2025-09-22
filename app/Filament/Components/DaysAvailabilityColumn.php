<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Tables\Columns\TextColumn;

final class DaysAvailabilityColumn
{
    public static function make(string $name = 'days_availability'): TextColumn
    {
        return TextColumn::make($name)
            ->label('Days availability')
            ->formatStateUsing(function ($state) {
                $value = is_string($state) ? json_decode($state, true) : $state;
                if (! is_array($value)) {
                    return $state;
                }
                if (empty($value)) {
                    return '-';
                }

                return implode(', ', $value);
            })
            ->tooltip(function ($state) {
                $value = is_string($state) ? json_decode($state, true) : $state;
                if (! is_array($value) || empty($value)) {
                    return null;
                }

                return implode("\n", $value);
            });
    }
}
