<?php

use App\Models\{Column, Rate};
use Faker\Generator as Faker;

$factory->define(Rate::class, function (Faker $faker) {
    return [
        'column_id' => function() {
            return factory(Column::class)->create()->id;
        },
        'name' => $faker->name,
        'color' => $faker->hexColor,
    ];
});
