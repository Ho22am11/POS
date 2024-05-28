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
       
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'user']);
    }
}
