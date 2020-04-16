<?php

use Illuminate\Database\Seeder;

class LicensingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Licensing::class, 10)->create();
    }
}
