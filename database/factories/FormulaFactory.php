<?php

use App\Models\{Formula, Unit, Version};
use Faker\Generator as Faker;

$factory->define(Formula::class, function (Faker $faker) {
    $version = factory(Version::class)->create();

    return [
        'version_id' => function() use ($version) {
            return $version->id;
        },
        'target_id' => function() use ($version) {
            return factory(Unit::class)->create(['version_id' => $version->id])->id;
        },
        'unit_id' => function() use ($version) {
            return factory(Unit::class)->create(['version_id' => $version->id])->id;
        }
    ];
});
