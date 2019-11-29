<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->text(20),
        'description'=>$faker->text(50),
        'status'=>\Illuminate\Support\Arr::random(Category::$Status),
    ];
});
