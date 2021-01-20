<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Manager']);

        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.view']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.view']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);
        Permission::create(['name' => 'categories.create']);
        Permission::create(['name' => 'categories.view']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.delete']);
        Permission::create(['name' => 'units.create']);
        Permission::create(['name' => 'units.view']);
        Permission::create(['name' => 'units.edit']);
        Permission::create(['name' => 'units.delete']);

        $role1->givePermissionTo('users.create');
        $role1->givePermissionTo('users.view');
        $role1->givePermissionTo('users.edit');
        $role1->givePermissionTo('users.delete');
        $role1->givePermissionTo('roles.create');
        $role1->givePermissionTo('roles.view');
        $role1->givePermissionTo('roles.edit');
        $role1->givePermissionTo('roles.delete');

        $role2->givePermissionTo('users.view');

        User::find(1)->assignRole($role1);
        User::find(2)->assignRole($role2);

//        $role1 = Role::find(1);


    }
}
