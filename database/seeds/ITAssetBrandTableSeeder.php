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
                'name' => 'Dell',
                'description' => '-',
            ],
            [
                'name' => 'LENOVO',
                'description' => '-',
            ],
            [
                'name' => 'HP',
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
            [
                'name' => 'LG',
                'description' => '-',
            ],
            [
                'name' => 'Synology',
                'description' => '-',
            ],
            [
                'name' => 'FortiGate',
                'description' => '-',
            ],
            [
                'name' => 'Others',
                'description' => '-',
            ],
        ];

        foreach ($brand as $brand) {
            \App\ITAssetBrand::create($brand);
        }

    }
}
