<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionGroups = [
            'dashboard' => [
                'admin.dashboard',
               

            ],
            'admin' => [
                'admin.index',
                'admin.create',
                'admin.store',
                'admin.edit',
                'admin.update',
                'admin.password.edit',
                'admin.password.update',
            ],
            'role' => [
                'admin.roles.index',
                'admin.roles.create',
                'admin.roles.store',
                'admin.roles.edit',
                'admin.roles.update',
                'admin.roles.destroy',
            ],
            'setting' => [
                'admin.settings.index',
                'admin.settings.create',

            ],

        ];

        foreach ($permissionGroups as $group => $permissions) {
            foreach ($permissions as $permissionName) {
                Permission::updateOrCreate(
                    ['name' => $permissionName, 'guard_name' => 'admin'],
                    ['group_name' => $group]
                );
            }
        }

        $superAdminRole = Role::where('name', 'Super Admin')->where('guard_name', 'admin')->first();
        if ($superAdminRole) {
            $superAdminRole->syncPermissions(Permission::all());
        }

        $this->command->info('Permissions with groups seeded successfully!');
    }
}
