<?php

declare(strict_types=1);

namespace App\Enums;

enum PromoType: string
{
    case SIMPLE = 'simple';
    case COUPON = 'coupon';
    case GIFT = 'gift';
    case ONE_PLUS_ONE = 'one_plus_one';
    case TWO_PLUS_ONE = 'two_plus_one';
    case CASHBACK = 'cashback';
    case KONKURS = 'konkurs';
} 