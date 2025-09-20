<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Forms\Components\Select;
use Spatie\Permission\Models\Role;

class RolesSelect extends Select
{
    public static function make(?string $name = 'roles'): static
    {
        return parent::make($name)
            ->multiple()
            ->relationship('roles', 'name')
            ->options(function () {
                $user = auth()->user();

                if ($user && $user->hasRole('super-admin')) {
                    return Role::pluck('name', 'id');
                }

                if ($user && $user->hasRole('admin')) {
                    return Role::whereIn('name', ['moderator', 'user'])->pluck('name', 'id');
                }

                return [];
            })
            ->preload();
    }
}
