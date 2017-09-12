<?php

namespace RafflesArgentina\UserRoleAndPermission\Database\Seeds;

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'roles.index', 'description' => 'Listar o ver detalles de roles']);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear nuevos registros de roles']);
        Permission::create(['name' => 'roles.edit', 'description' => 'Actualizar registros de roles']);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar registros de roles']);

        Permission::create(['name' => 'users.index', 'description' => 'Listar o ver detalles de usuarios']);
        Permission::create(['name' => 'users.create', 'description' => 'Crear nuevos registros de usuarios']);
        Permission::create(['name' => 'users.edit', 'description' => 'Actualizar registros de usuarios']);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar registros de usuarios']);
    }
}
