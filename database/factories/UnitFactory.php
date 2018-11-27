<?php

use App\Models\{Rate, Unit, Version};
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'version_id'  => function() {
            return factory(Version::class)->create()->id;
        },
        'rate_id'     => function() {
            return factory(Rate::class)->create()->id;
        },
        'name'        => $faker->name,
        'description' => $faker->paragraph,
        'order'       => 0,
        'etc'         => false,
        'lowest'      => false,
        'count'       => 0,
    ];
});
