<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'product_id' => function() {
            return App\Product::all()->random();
        },
        'customer_id' => function() {
            return App\Customer::all()->random();
        },
        'rating' => $faker->numberBetween(1,5),
        'review' => $faker->text(200),
    ];
});
