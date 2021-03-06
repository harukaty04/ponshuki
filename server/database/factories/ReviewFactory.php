<?php

use Faker\Generator as Faker;
use App\Models\Review;
use Illuminate\Support\Str;

// FIXME: 適当に作ったので後で直す！！
$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id'         => $faker->randomNumber(),
        'title'           => $faker->title(),
        'content'         => $faker->text(),
        'taste_intensity' => $faker->randomNumber(),
        'scent_strength'  => $faker->randomNumber(),
        'evaluation'      => $faker->randomNumber(),
        'image'           => $faker->url()
    ];
});

