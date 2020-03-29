<?php

use Illuminate\Database\Seeder;

class AssetCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AssetCategory::class, 5)->create();
    }
}
