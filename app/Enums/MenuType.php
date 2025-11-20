<?php

declare(strict_types=1);

namespace App\Enums;

enum MenuType: string
{
    case NAVBAR = 'navbar';
    case SIDEBAR = 'sidebar';
    case PROMO_SIDEBAR = 'promo_sidebar';

    /**
     * @return array<string,string>
     */
    public static function formOptions(): array
    {
        return [
            self::NAVBAR->value => 'Верхнее меню (NavBar)',
            self::SIDEBAR->value => 'Боковое меню (Sidebar)',
            self::PROMO_SIDEBAR->value => 'Боковое меню промо (Promo Sidebar)',
        ];
    }

    /**
     * @return array<string,string>
     */
    public static function filterOptions(): array
    {
        return [
            self::NAVBAR->value => 'NavBar',
            self::SIDEBAR->value => 'Sidebar',
            self::PROMO_SIDEBAR->value => 'Promo Sidebar',
        ];
    }

    public function getColor(): string
    {
        return match ($this) {
            self::NAVBAR => 'info',
            self::SIDEBAR => 'success',
            self::PROMO_SIDEBAR => 'warning',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::NAVBAR => 'NavBar',
            self::SIDEBAR => 'Sidebar',
            self::PROMO_SIDEBAR => 'Promo Sidebar',
        };
    }
}
