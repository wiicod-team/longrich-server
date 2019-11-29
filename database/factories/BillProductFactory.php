<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\BillProduct;
use Faker\Generator as Faker;

$factory->define(BillProduct::class, function (Faker $faker) {
    $b = \App\Helpers\FactoryHelper::getOrCreate(\App\Bill::class)->id;
    $p = \App\Helpers\FactoryHelper::getOrCreate(\App\Product::class)->id;
    return [
        //
        'retail_price'=>$faker->numberBetween(1000,100000),
        'quantity'=>$faker->numberBetween(1,10),
        'bill_id'=>$b,
        'product_id'=>$p,
    ];
});
