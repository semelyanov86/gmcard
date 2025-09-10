<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $pass  = env('ADMIN_PASSWORD');

        $admin = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'password' => Hash::make($pass), // @phpstan-ignore-line
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $role = Role::firstOrCreate(
            ['name' => 'admin'],
            ['created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $permission = Permission::firstOrCreate(
            ['name' => 'access admin'],
            ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );

        $role->givePermissionTo($permission);
        $admin->assignRole($role);
    }
}
