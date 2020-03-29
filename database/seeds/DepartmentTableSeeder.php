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
                'name' => 'Production',
                'description' => '-',
            ],
            [
                'name' => 'Human Resources',
                'description' => '-',
            ],
            [
                'name' => 'Sales',
                'description' => '-',
            ],
            [
                'name' => 'Top Management',
                'description' => '-',
            ],
            [
                'name' => 'IT',
                'description' => '-',
            ],
        ];

        foreach ($department as $department) {
            \App\Department::create($department);
        }
    }
}
