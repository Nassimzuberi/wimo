<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
  $faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($faker));
	return [
	    	'name'=> $faker->vegetableName(),
	];
});
