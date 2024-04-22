<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(1);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $role = Role::find(2);

        $permissions = Permission::where('id', '>', 0)->get();

        $role->syncPermissions($permissions);
    }
}
