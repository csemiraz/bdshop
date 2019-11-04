<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => function() {
            return App\Category::all()->random();
        },
        'brand_id' => function() {
            return App\Brand::all()->random();
        },
        'supplier_id' => function() {
            return App\Supplier::all()->random();
        },
        'name' => $faker->word,
        'description' => $faker->text(300),
        'view_count' => $faker->randomDigit,
        'price' => $faker->numberBetween(50, 2000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2, 40),
        'image' => $faker->imageUrl(400, 500),
        'status' => $faker->numberBetween(0,1),
    ];
});
