<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Staff::class, function (Faker $faker) {
    return [
        'role_id' => $faker->numberBetween($min = 1, $max = 2),
        'staff_no' => $faker->numerify('LS ###'),
        'email'=> $faker->safeEmail,
        'username' => $faker->userName,
        'full_name' => $faker->name,
        'company_id' => $faker->numberBetween($min = 1, $max = 3),
        'department_id' => $faker->numberBetween($min = 1, $max = 5),
        'designation_id' => $faker->numberBetween($min = 1, $max = 5),
        'password' => '$2y$10$GYsXiibGBQVsKDJXbzyvQ.AoCky/T/r251TQwciROy3G9f4dU/x3.'

    ];
});
