<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Helpers\FactoryHelper;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $c = \App\Helpers\FactoryHelper::getOrCreate(\App\Category::class)->id;
    $p = $faker->numberBetween(1000,100000);
    $pm=$faker->boolean()?intdiv($p*75,100):null;
    $p1 =  FactoryHelper::fakeFile($faker,'products/picture');
    $p2 = $p3 = null;
    if($faker->boolean()){
        $p2= FactoryHelper::fakeFile($faker,'products/picture');
        if($faker->boolean(75)){
           $p3= FactoryHelper::fakeFile($faker,'products/picture');
        }
    }
    return [
        //
        'name'=>$faker->text(20),
        'status'=>\Illuminate\Support\Arr::random(\App\Product::$Status),
        'description'=>$faker->text(),
        'weight'=>$faker->randomFloat(2,10,10000),
        'price'=>$p,
        'price_promo'=>$pm,
        'dosage'=>$faker->text(),
        'composition'=>$faker->text(),
        'picture1'=>$p1,
        'picture2'=>$p2,
        'picture3'=>$p3,
        'category_id'=>$c
    ];
});
