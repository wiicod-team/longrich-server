<?php

namespace App\Providers;

use App\Delivery;
use App\Notifications\DeliveryReminder;
use App\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Delivery::created(function (Delivery $d){
            $users = User::whereStatus('admin')->get();
            Notification::send($users, new DeliveryReminder($d));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
