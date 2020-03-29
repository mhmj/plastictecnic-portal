<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ITAssetBrand::class, function (Faker $faker) {
    return [
        'name'=> $faker->randomElement(array ('HP','DELL','TP-LINK')),
        'description'=> $faker->sentence($nbWords = 5, $variableNbWords = true) ,
    ];
});
