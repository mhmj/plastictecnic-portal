<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = [
            [
                'role_id' => '1',
                'staff_no' => 'L0070',
                'email' => 'mhazimmdjais@gmail.com',
                'username' => 'mhmj',
                'full_name' => 'Muhammad Hazim',
                'company_id' => '1',
                'department_id' => '5',
                'designation_id' => '1',
                'telephone_no' => '03-8925 6950',
                'phone_no' => '0177600026',
                'password' => '$2y$10$GYsXiibGBQVsKDJXbzyvQ.AoCky/T/r251TQwciROy3G9f4dU/x3.'
            ]
        ];

        foreach ($staff as $staff) {
            \App\Staff::create($staff);
        }
        //factory(App\Staff::class, 20)->create();
    }
}
