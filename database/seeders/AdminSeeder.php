<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::updateOrCreate(
            ['name' => 'Super Admin', 'guard_name' => 'admin']
        );

        $adminRole = Role::updateOrCreate(
            ['name' => 'Admin', 'guard_name' => 'admin']
        );

        $superAdmin = Admin::updateOrCreate(
            ['email' => 'super@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'),
                'role' => $superAdminRole->id,
                'status' => 1,
                'image' => null,

            ]
        );
        $superAdmin->assignRole($superAdminRole->name);

        $admin = Admin::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role' => $adminRole->id,
                'status' => 1,
                'image' => null,

            ]
        );
        $admin->assignRole($adminRole->name);

        $this->command->info('Super Admin and Admin created successfully!');
    }
}
