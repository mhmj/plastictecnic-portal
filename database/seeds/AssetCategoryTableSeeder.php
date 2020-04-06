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
        $category = [
            [
                'name' => 'Laptop',
                'description' => '-',
            ],
            [
                'name' => 'Desktop',
                'description' => '-',
            ],
            [
                'name' => 'Server',
                'description' => '-',
            ],
            [
                'name' => 'Switch',
                'description' => '-',
            ],
            [
                'name' => 'NAS Storage',
                'description' => '-',
            ],
            [
                'name' => 'Firewall',
                'description' => '-',
            ],
            [
                'name' => 'Printer',
                'description' => '-',
            ],
            [
                'name' => 'Others',
                'description' => '-',
            ],
        ];

        foreach ($category as $category) {
            \App\AssetCategory::create($category);
        }

    }
}
