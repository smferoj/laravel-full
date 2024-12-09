<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        DB::table('users')->insert(
            [
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'smferoj27@gmail.com',
            'password' => Hash::make('12345678'),
            'phone'=> fake()->phoneNumber,
            'address'=> fake()->address,
            'photo'=> fake()->imageUrl('60', '60'),
            'role'=> fake()->randomElement(['admin', 'agent', 'user']),
            'status'=> fake()->randomElement(['active', 'inactive']),
            'remember_token' => Str::random(10),
           ], 
            [
            'name' => 'Agent',
            'username' => 'agent',
            'email' => 'sm.feroj21@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'agent',
            'status' => 'active',
           ], 
    
            [
            'name' => 'User',
            'username' => 'user',
            'email' => 'sm.feroj@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'status' => 'active',
           ], 
    );
         
    }
}
