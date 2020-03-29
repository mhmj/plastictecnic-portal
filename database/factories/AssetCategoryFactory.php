<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\AssetCategory::class, function (Faker $faker) {
    return [
        'name'=> $faker->randomElement(array ('Laptop','Desktop','Printer','Access Point','Cable')),
        'description'=> $faker->sentence($nbWords = 5, $variableNbWords = true) ,
    ];
});
