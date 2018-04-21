<?php

use Faker\Generator as Faker;

$factory->define(App\Document::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'excerpt' =>$faker->paragraph,
        'pdfbook' =>str_random(20),
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
        'category_id' => function(){
            return factory(\App\Category::class)->create()->id;
        }

    ];
});
