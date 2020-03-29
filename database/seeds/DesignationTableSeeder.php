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
                'name' => 'IT Programmer',
                'description' => '-',
            ],
            [
                'name' => 'Head of Department',
                'description' => '-',
            ],
            [
                'name' => 'Engineer',
                'description' => '-',
            ],
            [
                'name' => 'Support',
                'description' => '-',
            ],
            [
                'name' => 'Accountant',
                'description' => '-',
            ],
        ];

        foreach ($designation as $designation) {
            \App\Designation::create($designation);
        }
    }
}
