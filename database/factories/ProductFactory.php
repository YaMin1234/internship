<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
     "name"=>$faker->sentence,
     "category_id"=>rand(1,5),
     "user_id"=>rand(1,2),
    ];
});
