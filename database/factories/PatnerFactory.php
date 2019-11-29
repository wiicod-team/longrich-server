<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Patner;
use Faker\Generator as Faker;

$factory->define(Patner::class, function (Faker $faker) {
    $t = \App\Helpers\FactoryHelper::getOrCreate(\App\Town::class)->id;
    return [
        //
        'name'=>$faker->name,
        'phone'=>$faker->phoneNumber,
        'town_id'=>$t
    ];
});
