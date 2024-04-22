<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Permission::all()->count() > 0) {
            Permission::destroy(Permission::all()->pluck("id")->toArray());
        }

        DB::statement("ALTER TABLE permissions AUTO_INCREMENT = 1");

        $data = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'import-list',
            'import-create',
            'import-edit',
            'import-delete',
            'export-list',
            'export-create',
            'export-edit',
            'export-delete',
            'driver-view',
            'driver-manage',

            'customer-list'
        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
