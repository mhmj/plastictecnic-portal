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
                'name' => 'Printer',
                'description' => '-',
            ],
            [
                'name' => 'Access Point',
                'description' => '-',
            ],
            [
                'name' => 'Cable',
                'description' => '-',
            ],
        ];

        foreach ($category as $category) {
            \App\AssetCategory::create($category);
        }

    }
}
