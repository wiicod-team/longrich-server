<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Bill;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Bill::class, function (Faker $faker) {

    $c = \App\Helpers\FactoryHelper::getOrCreate(\App\Customer::class)->id;
    return [
        //
        'amount'=>$faker->numberBetween(1000,100000),
        'payment_code'=>Str::random(10),
        'status'=>\Illuminate\Support\Arr::random(Bill::$Status),
        'payment_method'=>$faker->text(10),
        'customer_id'=>$c
    ];
});
