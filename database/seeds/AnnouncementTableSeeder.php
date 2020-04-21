<?php

use Illuminate\Database\Seeder;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcement = [
            [
                'staff_id' => '1',
                'title' => 'LOREM IPSUM',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'category' => 'Health',
                'remark' => 'Urgent',
                'file' => '',
            ],
            [
                'staff_id' => '1',
                'title' => 'HODOR IPSUM',
                'description' => 'Hodor. Hodor hodor, hodor. Hodor hodor hodor hodor hodor. Hodor. Hodor! Hodor hodor, hodor; hodor hodor hodor. Hodor. Hodor hodor; hodor hodor - hodor, hodor, hodor hodor. Hodor, hodor. Hodor. Hodor, hodor hodor hodor; hodor hodor; hodor hodor hodor! Hodor hodor HODOR! Hodor hodor... Hodor hodor hodor...',
                'category' => 'Health',
                'remark' => 'Urgent',
                'file' => '',
            ],
            [
                'staff_id' => '1',
                'title' => 'TRUMP IPSUM',
                'description' => 'Lorem ipsum dolor amet mustache knausgaard +1, blue bottle waistcoat tbh semiotics artisan synth stumptown gastropub cornhole celiac swag. Brunch raclette vexillologist post-ironic glossier ennui XOXO mlkshk godard pour-over blog tumblr humblebrag. Blue bottle put a bird on it twee prism biodiesel brooklyn. Blue bottle ennui tbh succulents',
                'category' => 'Health',
                'remark' => 'Urgent',
                'file' => '',
            ],
            [
                'staff_id' => '1',
                'title' => 'HIPSTER IPSUM',
                'description' => 'Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium.',
                'category' => 'Health',
                'remark' => 'Urgent',
                'file' => 'Announce1.pdf',
            ]
        ];

        foreach ($announcement as $announcement) {
            \App\Announcement::create($announcement);
        }
    }
}
