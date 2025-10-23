<?php

declare(strict_types=1);

namespace App\Enums;

enum MenuType: string
{
    case NAVBAR = 'navbar';
    case SIDEBAR = 'sidebar';

    /**
     * @return array<string,string>
     */
    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}

