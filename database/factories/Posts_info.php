<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\posts_info;
use Faker\Generator as Faker;

$factory->define(posts_info::class, function (Faker $faker) {
    return [
      'post_id' => $faker->numberBetween(1,200),
      'description' => $faker->paragraph(),
      'slug' => $faker->slug()
    ];
});
