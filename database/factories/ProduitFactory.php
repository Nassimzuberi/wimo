<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'lat' => $faker->numberBetween(50,60),
        'long' => $faker->numberBetween(1,15),
        'img' => 'https://www.webfx.com/blog/images/cdn.designinstruct.com/files/582-how-to-image-placeholders/generic-image-placeholder.png',
        'description' => $faker->text(100),
        'prix_unit' => $faker->randomFloat(1,1,15),
        'quantity' => $faker->numberBetween(1,15),
    ];
});
