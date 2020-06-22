<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read roles']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'create carrerauser']);
        Permission::create(['name' => 'read carrerausers']);
        Permission::create(['name' => 'update carrerauser']);
        Permission::create(['name' => 'delete carrerauser']);

        Permission::create(['name' => 'create student']);
        Permission::create(['name' => 'read students']);
        Permission::create(['name' => 'update student']);
        Permission::create(['name' => 'delete student']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'Normal']);
        $role->givePermissionTo('read users');
        $role->givePermissionTo('read students');
        $role->givePermissionTo('read carrerausers');
        // $role->givePermissionTo('update user');

        $role = Role::create(['name' => 'Coordinador']);
        $role->givePermissionTo('create student');
        $role->givePermissionTo('read students');
        $role->givePermissionTo('update student');
        $role->givePermissionTo('delete student');

        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all());
    }
}
