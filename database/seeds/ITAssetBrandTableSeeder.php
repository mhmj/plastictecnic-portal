<?php

use Illuminate\Database\Seeder;

class ITAssetBrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ITAssetBrand::class, 5)->create();
    }
}
