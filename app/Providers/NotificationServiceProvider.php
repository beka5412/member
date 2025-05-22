<?php

namespace App\Providers;
use App\Models\Store;
use App\Models;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $user = \Auth::user()->current_store ?? null;
            $store = Store::find($user);

            if($store){
                $view->with('store_notifications', $store);
            }
        });
    }
}
