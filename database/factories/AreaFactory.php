<?php

use Faker\Generator as Faker;

$factory->define(App\Area::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'code' => str_random(3),
        'level' => rand(1,5),
        'parent_id' => rand(1,5),
    ];
});
