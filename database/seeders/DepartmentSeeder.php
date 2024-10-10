<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            ['name' => 'Human Resources', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Finance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marketing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IT', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Operations', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sales', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Customer Support', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Research & Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Legal', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
