<?php

use App\Models\{Avatar, User};
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'avatar_id'      => function() {
            return factory(Avatar::class)->create()->id;
        },
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => 'secret',
        'tel'            => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});
