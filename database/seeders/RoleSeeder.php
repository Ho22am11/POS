<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::all();

       $roleadmin = Role::create(['name' => 'admin']);

       
       $roleadmin->syncPermissions($permissions);
       
       $roleemployee = Role::create(['name' => 'employee']);
       $roleemployee->syncPermissions( 2 , 4 , 5 , 6 , 7 , 9 , 10 , 11 );

       $roleuser = Role::create(['name' => 'user']);
       $roleemployee->syncPermissions( 2 );

    }
}
