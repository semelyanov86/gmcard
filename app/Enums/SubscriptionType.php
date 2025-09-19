<?php

declare(strict_types=1);

namespace App\Enums;

enum SubscriptionType: string
{
    case BASIC = 'Базовый';
    case PREMIUM = 'Премиум';
    case PARTNER = 'Партнерский';
}
