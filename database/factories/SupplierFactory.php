<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company' => $faker->word,
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->companyEmail,
        'status' => $faker->numberBetween(0,1),     
    ];
});
