<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User Permissions
        Permission::create([
            'name' => 'View users',
            'display_name' => 'Ver usuarios',
        ]);
        Permission::create([
            'name' => 'Create users',
            'display_name' => 'Crear usuarios',
        ]);
        Permission::create([
            'name' => 'Update users',
            'display_name' => 'Actualizar usuarios',
        ]);
        Permission::create([
            'name' => 'Delete users',
            'display_name' => 'Eliminar usuarios',
        ]);

        //Roles Permissions
        Permission::create([
            'name' => 'View roles',
            'display_name' => 'Ver roles',
        ]);
        Permission::create([
            'name' => 'Create roles',
            'display_name' => 'Crear roles',
        ]);
        Permission::create([
            'name' => 'Update roles',
            'display_name' => 'Actualizar roles',
        ]);
        Permission::create([
            'name' => 'Delete roles',
            'display_name' => 'Eliminar roles',
        ]);

        //Productos Permissions

        Permission::create([
            'name' => 'View loans',
            'display_name' => 'Ver prestamos',
        ]);
        Permission::create([
            'name' => 'Create loans',
            'display_name' => 'Crear prestamos',
        ]);
        Permission::create([
            'name' => 'Update loans',
            'display_name' => 'Actualizar prestamos',
        ]);
        Permission::create([
            'name' => 'Delete loans',
            'display_name' => 'Eliminar prestamos',
        ]);

        //Permissions Permissions

        Permission::create([
            'name' => 'View permissions',
            'display_name' => 'Ver permisos',
        ]);

        Permission::create([
            'name' => 'Update permissions',
            'display_name' => 'Actualizar permisos',
        ]);

        //Departments Permissions
        Permission::create([
            'name' => 'View departments',
            'display_name' => 'Ver departamentos'
        ]);
        Permission::create([
            'name' => 'Create departments',
            'display_name' => 'Crear departamentos'
        ]);
        Permission::create([
            'name' => 'Update departments',
            'display_name' => 'Actualizar departamentos'
        ]);
        Permission::create([
            'name' => 'Delete departments',
            'display_name' => 'Eliminar departamentos'
        ]);

    }
}
