<?php

declare(strict_types=1);

namespace Database\Seeders\Auth;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $accessAdminPermission = Permission::firstOrCreate(
            ['name' => 'access admin'],
            ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );

        $superAdminRole = Role::where('name', 'super-admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $moderatorRole = Role::where('name', 'moderator')->first();

        $superAdminRole?->givePermissionTo($accessAdminPermission);
        $adminRole?->givePermissionTo($accessAdminPermission);
        $moderatorRole?->givePermissionTo($accessAdminPermission);
    }
}
