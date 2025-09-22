<?php

declare(strict_types=1);

namespace App\Enums;

enum PaymentType: string
{
    case INCOMING = 'Поступление';
    case OUTGOING = 'Списание';

    /**
     * @return array<string,string>
     */
    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}
