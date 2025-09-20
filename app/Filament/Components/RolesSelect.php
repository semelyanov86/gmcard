<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Forms\Components\Select;
use Spatie\Permission\Models\Role;
use App\Enums\RoleType;

class RolesSelect extends Select
{
    public static function make(?string $name = 'roles'): static
    {
        return parent::make($name)
            ->multiple()
            ->relationship('roles', 'name')
            ->options(function () {
                $user = auth()->user();

                if ($user && $user->hasRole(RoleType::SUPER_ADMIN->value)) {
                    return Role::pluck('name', 'id');
                }

                if ($user && $user->hasRole(RoleType::ADMIN->value)) {
                    return Role::whereIn('name', RoleType::adminAssignable())->pluck('name', 'id');
                }

                return [];
            })
            ->preload();
    }
}
