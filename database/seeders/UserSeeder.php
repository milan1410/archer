<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@archer.com',
            'password' => bcrypt('password'),
            'role' => 'admin', // Admin role
        ]);
        
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@archer.com',
            'password' => bcrypt('password'),
            'role' => 'manager', // Manager role
        ]);
        
        User::create([
            'name' => 'Employee User',
            'email' => 'employee@archer.com',
            'password' => bcrypt('password'),
            'role' => 'employee', // Employee role
        ]);
    }
}
