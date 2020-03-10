<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;

$factory->define(News::class, function () {
    $faker = Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->realText(rand(20,50)),
        'text' => $faker->realText(rand(1000,2000)),
        'isPrivate' => false,
        'image' => "",
        'category_id' => rand(1,2)
    ];
});
