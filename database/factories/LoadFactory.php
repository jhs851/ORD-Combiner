<?php

use App\Models\{Load, User};
use Faker\Generator as Faker;

$factory->define(Load::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'clear'   => rand(1, 100),
        'code'    => $faker->paragraph,
    ];
});
