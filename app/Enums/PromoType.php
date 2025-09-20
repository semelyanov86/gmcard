<?php

declare(strict_types=1);

namespace App\Enums;

enum PromoType: string
{
    case SIMPLE = 'Простая акция';
    case COUPON = 'Купон';
    case GIFT = 'Подарок';
    case ONE_PLUS_ONE = 'Один плюс один';
    case TWO_PLUS_ONE = 'Два плюс один';
    case CASHBACK = 'Кэшбэк';
    case KONKURS = 'Конкурс';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}
