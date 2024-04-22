<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Legoom Admin', 
            'email' => 'admin@legoom.net',
            'description' => 'Permission Laravel',
            'password' => Hash::make('12345678')
        ]);
         
        $role = Role::find(1);
  
        $user->assignRole([$role->id]);
    }
}