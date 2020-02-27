<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sales;
use Faker\Generator as Faker;

$factory->define(Sales::class, function (Faker $faker) {
    return [
      "product_id" => $faker->numberBetween(1,10),
        "price_unit" => $faker->randomDigit,
        "img" => $faker->imageUrl(640,480),
    ];
});
