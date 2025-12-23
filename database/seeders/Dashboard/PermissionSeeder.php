<?php

namespace Database\Seeders\Dashboard;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::query()->delete();
        $role = Role::updateOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        $permissions = [
            // Roles
            "roles" => [
                'create roles',
                'read roles',
                'update roles',
                'delete roles',
            ],

            // Users
            'user' => [
                'read users',
                'update users',
                'delete users',
            ],

            // Clients
            'clients' => [
                'read clients',
                'update clients',
                'delete clients',
            ],

            // Governorates
            'governorates' => [
                'create governorates',
                'read governorates',
                'update governorates',
                'delete governorates',
            ],

            // Cities
            'cities' => [
                'create cities',
                'read cities',
                'update cities',
                'delete cities',
            ],

            // Categories
            'categories' => [
                'create categories',
                'read categories',
                'update categories',
                'delete categories',
            ],

        ];
        foreach ($permissions as $group => $permissionList) {
            foreach ($permissionList as $permissionName) {
                $permission = Permission::updateOrCreate([
                    'name' => $permissionName,
                    'guard_name' => 'web',
                    'group' => $group
                ]);
                $role->givePermissionTo($permission);
            }
        }
    }
}
