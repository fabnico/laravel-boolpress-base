<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\posts;
use Faker\Generator as Faker;

$factory->define(posts::class, function (Faker $faker) {
    return [
      'category_id' => $faker->randomDigitNotNull(),
      'category_id'=> $faker->numberBetween(1,30),
      'title' => $faker->sentence(),
      'author'=> $faker->name()
    ];
});
