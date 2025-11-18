<?php

declare(strict_types=1);

namespace App\Enums;

enum Weekday: string
{
    case MONDAY = 'md';
    case TUESDAY = 'tu';
    case WEDNESDAY = 'wd';
    case THURSDAY = 'th';
    case FRIDAY = 'fr';
    case SATURDAY = 'su';
    case SUNDAY = 'sn';

    /**
     * @return array<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

