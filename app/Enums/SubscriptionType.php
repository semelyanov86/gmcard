<?php

declare(strict_types=1);

namespace App\Enums;

enum SubscriptionType: string
{
    case BASIC = 'Базовый';
    case PREMIUM = 'Премиум';
    case PARTNER = 'Партнерский';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}
