<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::insert([
            // Projects for Human Resources (department_id = 1)
            ['name' => 'Employee Onboarding', 'department_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HR Policy Review', 'department_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            // Projects for Finance (department_id = 2)
            ['name' => 'Year-End Financial Audit', 'department_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Budget Planning', 'department_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Projects for Marketing (department_id = 3)
            ['name' => 'Product Launch Campaign', 'department_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Social Media Strategy', 'department_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Projects for IT (department_id = 4)
            ['name' => 'Network Upgrade', 'department_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Center Migration', 'department_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Projects for Operations (department_id = 5)
            ['name' => 'Process Improvement Initiative', 'department_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Inventory Optimization', 'department_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
