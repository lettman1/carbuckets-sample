<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => "Manager",
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => "User",
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'role_id' => 3,
        ]);
    }
}
