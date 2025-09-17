<?php

declare(strict_types=1);

namespace App\Enums;

enum SubscriptionType: string
{
    case BASIC = 'базовая';
    case PREMIUM = 'премиум';
    case PARTNER = 'партнер';
}
