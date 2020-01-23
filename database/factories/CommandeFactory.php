<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commande;
use Faker\Generator as Faker;

$factory->define(Commande::class, function (Faker $faker) {
    return [
        'quantity' => $faker->randomDigit,
        'total' => $faker->randomDigit,
        'payement_option' => 1,
        'produit_id' => 1,
    ];
});
