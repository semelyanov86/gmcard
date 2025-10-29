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
    public static function formOptions(): array
    {
        return [
            self::NAVBAR->value => 'Верхнее меню (NavBar)',
            self::SIDEBAR->value => 'Боковое меню (Sidebar)',
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
        ];
    }

    public function getColor(): string
    {
        return match ($this) {
            self::NAVBAR => 'info',
            self::SIDEBAR => 'success',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::NAVBAR => 'NavBar',
            self::SIDEBAR => 'Sidebar',
        };
    }
}
