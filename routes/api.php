<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['namespace' => 'App\Api\V1\Controllers'],function (Router $api){
        $api->group(['prefix' => 'auth'], function(Router $api) {
            $api->post('signup', 'Auth\AuthController@signup');
            $api->post('signin', 'Auth\AuthController@signin');
            $api->get('me', 'Auth\AuthController@getAuthenticatedUser');
            $api->post('recovery', 'Auth\PasswordResetController@sendResetToken');
            $api->post('verify', 'Auth\PasswordResetController@verify');
            $api->post('reset', 'Auth\PasswordResetController@reset');
            $api->post('activateEmail', 'Auth\AccountVerificationController@activateEmail');
            $api->post('activatePhone', 'Auth\AccountVerificationController@activatePhone');
            $api->post('logout', 'LogoutController@logout');
            $api->post('refresh', 'RefreshController@refresh');
        });

        $api->group(['middleware' => 'api'], function(Router $api) {
            $api->get('protected', function() {
                return response()->json([
                    'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
                ]);
            });
            $api->group(['prefix' => 'users'], function(Router $api) {
                $api->get('me', 'UserController@me');
                $api->post('updateMe', 'Auth\AuthController@updateMe');
            });

            $api->resource("bill_products", 'BillProductController');
            $api->resource("bills", 'BillController');
            $api->resource("categories", 'CategoriesController');
            $api->resource("customers", 'CusteomerController');
            $api->resource("deliveries", 'DeliveryController');
            $api->resource("patners", 'PatnerController');
            $api->resource("products", 'ProductController');
            $api->resource("towns", 'TownController');
            $api->resource("users", 'UserController');

            $api->get('refresh', [
                'middleware' => 'jwt.refresh',
                function() {
                    return response()->json([
                        'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                    ]);
                }
            ]);
        });

        $api->get('hello', function() {
            return response()->json([
                'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
            ]);
        });
    });

});
