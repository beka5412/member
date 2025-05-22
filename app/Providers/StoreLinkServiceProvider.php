<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Student;
use App\Models\Store;
use App\Models\StoreLink;
use Illuminate\Support\Facades\Auth;

class StoreLinkServiceProvider extends ServiceProvider
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
            $student = Auth::guard('students')->user();

            if($student){
                $store_links = StoreLink::where('store_id', $student->store_id)->get();
                
                $view->with('store_links', $store_links);
            }
        });
    }
}
