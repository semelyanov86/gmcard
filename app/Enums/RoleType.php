<?php

declare(strict_types=1);

namespace App\Enums;

enum RoleType: string
{
    case SUPER_ADMIN = 'super-admin';
    case ADMIN = 'admin';
    case MODERATOR = 'moderator';
    case USER = 'user';

    /**
     * Get all role values as array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get roles that admin can assign
     */
    public static function adminAssignable(): array
    {
        return [
            self::MODERATOR->value,
            self::USER->value,
        ];
    }

    /**
     * Get all roles that super admin can assign
     */
    public static function superAdminAssignable(): array
    {
        return self::values();
    }
}
