<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'excerpt' =>$faker->paragraph,
        'published_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
    ];
});
