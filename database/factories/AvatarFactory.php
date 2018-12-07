<?php

use App\Models\Avatar;
use Faker\Generator as Faker;

$factory->define(Avatar::class, function (Faker $faker) {
    return [
        'name'  => '위습',
        'image' => $faker->sentence,
        'limit' => rand(1, 250),
    ];
});
