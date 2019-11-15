<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'category create']);
        Permission::create(['name' => 'category edit']);
        Permission::create(['name' => 'category delete']);


        $role = Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'user']);

        $user = User::whereId(1)->first();
        $user->assignRole($role);
    }
}
