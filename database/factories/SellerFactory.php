<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'address' => json_encode(["cp" => $faker->postcode,"voie"=>$faker->streetName,"commune"=> $faker->city,"num"=> $faker->randomDigit]),
        'phone_number' => "0612345678",
    ];
});
