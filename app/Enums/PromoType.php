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

    /**
     * @return array<string,string>
     */
    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }

    public static function fromId(int $id): self
    {
        return match ($id) {
            1 => self::SIMPLE,
            2 => self::COUPON,
            3 => self::GIFT,
            4 => self::ONE_PLUS_ONE,
            5 => self::TWO_PLUS_ONE,
            6 => self::CASHBACK,
            7 => self::KONKURS,
            default => throw new \ValueError("Invalid promo type id: $id"),
        };
    }
}
