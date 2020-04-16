<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Licensing::class, function (Faker $faker) {
    return [
        'it_asset_id' => $faker->numberBetween($min = 1, $max = 2),
        'company_id' => $faker->numberBetween($min = 1, $max = 1),
        'license_name'=> $faker->randomElement(array ('Microsoft Office','Adobe Creative CS')),
        'license_no' => $faker->numerify('Adobe ###'),
        'vendor' => $faker->randomElement(array ('Microsoft Corporation','Adobe Inc')),
        'serial_key' => $faker->sha1,
        'version' => $faker->randomElement(array ('2018.1.0','2019.1.0')),
        'quantity' => $faker->numberBetween($min = 1, $max = 1),
        'remark' => "running well",
        'date_purchased' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'date_expired' => $faker->date($format = 'Y-m-d', $max = 'now'),

    ];
});
