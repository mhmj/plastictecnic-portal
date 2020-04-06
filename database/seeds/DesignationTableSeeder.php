<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designation = [
            [
                'name' => 'Manager',
                'description' => '-',
            ],
            [
                'name' => 'Managing Director',
                'description' => '-',
            ],
            [
                'name' => 'Executive',
                'description' => '-',
            ],
            [
                'name' => 'Officer',
                'description' => '-',
            ],
            [
                'name' => 'Assistant',
                'description' => '-',
            ],
            [
                'name' => 'Accountant',
                'description' => '-',
            ],
            [
                'name' => 'Assistant Manager',
                'description' => '-',
            ],
            [
                'name' => 'Senior Executive',
                'description' => '-',
            ],
            [
                'name' => 'Senior Officer',
                'description' => '-',
            ],
            [
                'name' => 'Receptionist',
                'description' => '-',
            ],
            [
                'name' => 'Document Controller',
                'description' => '-',
            ],
            [
                'name' => 'Clerk',
                'description' => '-',
            ],
            [
                'name' => 'Assistant Officer',
                'description' => '-',
            ],
            [
                'name' => 'Material Planning',
                'description' => '-',
            ],
            [
                'name' => 'Supply Chain Executive',
                'description' => '-',
            ],
            [
                'name' => 'Operation Manager',
                'description' => '-',
            ],
            [
                'name' => 'Technical Advisor',
                'description' => '-',
            ],
            [
                'name' => 'Planner',
                'description' => '-',
            ],
            [
                'name' => 'Asset Supervisor',
                'description' => '-',
            ],
            [
                'name' => 'IT Programmer',
                'description' => '-',
            ],
            [
                'name' => 'IT Support',
                'description' => '-',
            ],
            [
                'name' => 'Others',
                'description' => '-',
            ],

        ];

        foreach ($designation as $designation) {
            \App\Designation::create($designation);
        }
    }
}
