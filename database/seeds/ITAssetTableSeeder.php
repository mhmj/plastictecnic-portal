<?php

use Illuminate\Database\Seeder;

class ITAssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ITAsset::class, 20)->create();
    }
}
