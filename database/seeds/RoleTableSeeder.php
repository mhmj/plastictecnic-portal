<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name' => 'Admin',
                'description' => '-',
            ],
            [
                'name' => 'Staff',
                'description' => '-',
            ],
        ];

        foreach ($role as $role) {
            \App\Role::create($role);
        }
    }
}
