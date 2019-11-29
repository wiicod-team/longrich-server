<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Delivery;
use Faker\Generator as Faker;

$factory->define(Delivery::class, function (Faker $faker) {
    $b = \App\Helpers\FactoryHelper::getOrCreate(\App\Bill::class)->id;
    $t = \App\Helpers\FactoryHelper::getOrCreate(\App\Town::class)->id;
    return [
        //
        'is_express'=>$faker->boolean(30),
        'status'=>\Illuminate\Support\Arr::random(Delivery::$Status),
        'delivery_date'=>$faker->dateTimeBetween('now','10 days'),
        'delivery_max_date'=>$faker->dateTimeBetween('10 days','15 days'),
        'road'=>$faker->streetName,
        'district'=>$faker->streetAddress,
        'information'=>$faker->text(60),
        'bill_id'=>$b,
        'town_id'=>$t
    ];
});
