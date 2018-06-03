<?php

use Faker\Generator as Faker;

$factory->define(\App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name(null),
        'class_id' => random_int(1,10),
        'dob' => $faker->date('Y-m-d', 'now'),
        'city' => $faker->city
    ];
});
