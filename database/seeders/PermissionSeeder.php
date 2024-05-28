<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =[
            'dashboard' ,
            'orders' ,
            'employees' ,
            'add prodect' ,
            'edit prodect' ,
            'add coustomer' , 
            'coustomer' ,
            'edit coustomer' ,
            'users' ,


        ];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]) ;
        }
    }
}
