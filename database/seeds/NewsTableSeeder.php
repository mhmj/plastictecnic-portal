<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            [
                'staff_id' => '1',
                'title' => 'COVID-19 Nearly End',
                'description' => 'To ensure this virus ended soon, we must unite to follow the government regulation in order to operate like usual',
                'category' => 'Health',
                'remark' => 'Urgent',
                'image_1' => '',
                'image_2' => '',
                'image_3' => '',
                'image_4' => '',
            ]
        ];

        foreach ($news as $news) {
            \App\News::create($news);
        }
    }
}
