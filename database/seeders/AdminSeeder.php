<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'email_verified_at' => now() ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

        ]);

        $user->assignRole('admin');

        $employee = User::create([
            'name' => 'employee',
            'email' => 'employee@gmail.com',
            'email_verified_at' => now() ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $employee->assignRole('employee');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now() ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $user->assignRole('user');
    }
}
