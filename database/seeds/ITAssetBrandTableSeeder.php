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
        $brand = [
            [
                'name' => 'HP',
                'description' => '-',
            ],
            [
                'name' => 'DELL',
                'description' => '-',
            ],
            [
                'name' => 'TP-LINK',
                'description' => '-',
            ],
            [
                'name' => 'LENOVO',
                'description' => '-',
            ],
            [
                'name' => 'ASUS',
                'description' => '-',
            ],
            [
                'name' => 'ACER',
                'description' => '-',
            ],
        ];

        foreach ($brand as $brand) {
            \App\ITAssetBrand::create($brand);
        }

    }
}
