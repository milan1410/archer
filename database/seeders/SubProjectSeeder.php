<?php

namespace Database\Seeders;

use App\Models\Subproject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subproject::insert([
            // Subprojects for Employee Onboarding (project_id = 1)
            ['name' => 'New Hire Orientation', 'project_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Benefits Enrollment', 'project_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            // Subprojects for HR Policy Review (project_id = 2)
            ['name' => 'Policy Documentation Update', 'project_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Compliance Training', 'project_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Subprojects for Year-End Financial Audit (project_id = 3)
            ['name' => 'Audit Preparation', 'project_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tax Filing', 'project_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Subprojects for Budget Planning (project_id = 4)
            ['name' => 'Expense Forecasting', 'project_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Revenue Projections', 'project_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Subprojects for Product Launch Campaign (project_id = 5)
            ['name' => 'Ad Design', 'project_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Market Research', 'project_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Subprojects for Social Media Strategy (project_id = 6)
            ['name' => 'Content Calendar Creation', 'project_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Influencer Outreach', 'project_id' => 6, 'created_at' => now(), 'updated_at' => now()],

            // Subprojects for Network Upgrade (project_id = 7)
            ['name' => 'Equipment Procurement', 'project_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Network Configuration', 'project_id' => 7, 'created_at' => now(), 'updated_at' => now()],

            // Subprojects for Data Center Migration (project_id = 8)
            ['name' => 'Server Setup', 'project_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Transfer', 'project_id' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
