<?php

use App\Models\{Rate, Unit};
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'rate_id'     => function() {
            return factory(Rate::class)->create()->id;
        },
        'name'        => $faker->name,
        'description' => $faker->paragraph,
        'order'       => 0,
        'warn'        => false,
        'etc'         => false,
        'lowest'      => false,
        'count'       => 0,
    ];
});
