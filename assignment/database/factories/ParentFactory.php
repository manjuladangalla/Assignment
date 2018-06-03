<?php

use Faker\Generator as Faker;

$factory->define(\App\Parents::class, function (Faker $faker) {
    $type = array("M","F");
    $randType = array_random($type,1);
    return [
        'name' => $faker->name(),
        'type' => $randType[0],
        'dob' =>$faker->date('Y-m-d','now')
    ];
});
