<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'admin@gmail.com';
        $pass = '12345678';

        if (! $email || ! $pass) {
            return;
        }

        $admin = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Super Admin',
                'password' => Hash::make($pass), // @phpstan-ignore-line
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $superAdminRole = Role::where('name', 'super-admin')->first();

        if (! $superAdminRole) {
            return;
        }

        if (! $admin->hasRole('super-admin')) {
            $admin->assignRole($superAdminRole);
        }
    }
}
