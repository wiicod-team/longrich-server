<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $u = \App\Helpers\FactoryHelper::getOrCreate(\App\User::class,true)->id;
    return [
        //
        'name'=>$faker->name,
        'phone'=>$faker->phoneNumber,
        'status'=>\Illuminate\Support\Arr::random(Customer::$Status),
        'gender'=>\Illuminate\Support\Arr::random(['M','F']),
        'user_id'=>$u
    ];
});
