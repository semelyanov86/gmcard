<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignAdminRole extends Command
{
    protected $signature = 'admin:assign-role';
    protected $description = 'Assign admin role to admin user';

    public function handle()
    {
        $this->info('Assigning admin role...');

        // Find or create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('12345678'),
                'email_verified_at' => now()
            ]
        );

        // Create role and permission
        $role = Role::firstOrCreate(['name' => 'admin']);
        $permission = Permission::firstOrCreate(['name' => 'access admin']);
        
        // Give permission to role
        $role->givePermissionTo($permission);
        
        // Assign role to user
        $admin->assignRole($role);
        
        $this->info("Admin role assigned to: {$admin->email}");
        $this->info("Admin roles: " . $admin->roles->pluck('name')->join(', '));
        
        return 0;
    }
}
