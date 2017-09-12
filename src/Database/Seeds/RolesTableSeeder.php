<?php

namespace RafflesArgentina\UserRoleAndPermission\Database\Seeds;

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create(['name' => 'superadmin', 'description' => 'Super administrador', 'special' => 'all-access']);
        $admin = Role::create(['name' => 'admin', 'description' => 'Administrador']);

        $rolePermissions = Permission::where('name', 'roles.index')->pluck('id')->toArray();
        $userPermissions = Permission::where('name', 'LIKE', 'users.'.'%')->pluck('id')->toArray();
        $admin->syncPermissions(array_merge($rolePermissions, $userPermissions));
    }
}
