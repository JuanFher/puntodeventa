<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => $faker->word(3).$faker->numberBetween($min = 100, $max = 900), 
        'name' => $faker->sentence, 
        'image' => $faker->imageUrl(480, 480),
        'sell_price' => $faker->numberBetween($min = 100, $max = 900), 
        'category_id' => $faker->numberBetween($min = 1, $max = 10), 
        'provider_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
