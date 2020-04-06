<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = [
            [
                'name' => 'Finance - Admin',
                'description' => '-',
            ],
            [
                'name' => 'Corporate Management',
                'description' => '-',
            ],
            [
                'name' => 'Finance (Ghm)',
                'description' => '-',
            ],
            [
                'name' => 'Gad - Admin',
                'description' => '-',
            ],
            [
                'name' => 'Mfg - Admin',
                'description' => '-',
            ],
            [
                'name' => 'Mfg - Engineering',
                'description' => '-',
            ],
            [
                'name' => 'Mfg - Injection',
                'description' => '-',
            ],
            [
                'name' => 'Mfg - Printing',
                'description' => '-',
            ],
            [
                'name' => 'Mfg - Q.A.',
                'description' => '-',
            ],
            [
                'name' => 'Mfg - Technical',
                'description' => '-',
            ],
            [
                'name' => 'Mfg - Maintenance',
                'description' => '-',
            ],
            [
                'name' => 'Mfg - Pad Print & Spraying',
                'description' => '-',
            ],
            [
                'name' => 'Mould',
                'description' => '-',
            ],
            [
                'name' => 'Planning Dept',
                'description' => '-',
            ],
            [
                'name' => 'Purchasing',
                'description' => '-',
            ],
            [
                'name' => 'Sales',
                'description' => '-',
            ],
            [
                'name' => 'T.C.D',
                'description' => '-',
            ],
            [
                'name' => 'W/H - Admin',
                'description' => '-',
            ],
            [
                'name' => 'Supply Chain',
                'description' => '-',
            ],
            [
                'name' => 'Quality Management System',
                'description' => '-',
            ],
            [
                'name' => 'Corporate Management',
                'description' => '-',
            ],
            [
                'name' => 'Managing Director',
                'description' => '-',
            ],
            [
                'name' => 'IT',
                'description' => '-',
            ],
            [
                'name' => 'Others',
                'description' => '-',
            ],
        ];

        foreach ($department as $department) {
            \App\Department::create($department);
        }
    }
}
