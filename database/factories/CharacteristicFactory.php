<?php

use App\Models\Characteristic;
use Faker\Generator as Faker;

$factory->define(Characteristic::class, function (Faker $faker) {
    $name = $faker->name;

    return [
        'name'   => $name,
        'regexp' => $name
    ];
});
