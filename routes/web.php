<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('reset_password/{token}', ['as' => 'password.reset', function($token)
{
    // implement your reset password route here!
}]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/img/{model}/{image}', function ($model, $image) {
    return \App\Helpers\RestHelper::getFile('img',$model,$image);
    //return Storage::get("stock-images/".$type."/".$image); //will ensure a jpg is always returned
})->where('image', '.*');
