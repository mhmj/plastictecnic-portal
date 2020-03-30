<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ITAsset::class, function (Faker $faker) {
    return [
        'asset_category_id' => $faker->numberBetween($min = 1, $max = 5),
        'company_id' => $faker->numberBetween($min = 1, $max = 3),
        'staff_id' => $faker->numberBetween($min = 1, $max = 20),
        'it_asset_brand_id' => $faker->numberBetween($min = 1, $max = 5),
        'model'=> $faker->numerify('AS ###'),
        'serial_no' => $faker->swiftBicNumber,
        'service_tag' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'year_purchased' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'warranty_status' => $faker->randomElement(array ('Yes','No')),
        'warranty_period' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
