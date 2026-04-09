<?php

declare(strict_types=1);

namespace App\Enums;

use ValueError;

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
        foreach (self::cases() as $case) {
            if ($case->id() === $id) {
                return $case;
            }
        }

        throw new ValueError("Invalid promo type id: $id");
    }

    public function id(): int
    {
        return match ($this) {
            self::SIMPLE => 1,
            self::COUPON => 2,
            self::GIFT => 3,
            self::ONE_PLUS_ONE => 4,
            self::TWO_PLUS_ONE => 5,
            self::CASHBACK => 6,
            self::KONKURS => 7,
        };
    }
}
