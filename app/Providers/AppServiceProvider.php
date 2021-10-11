<?php

namespace App\Providers;

use App\Cat;
use App\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('front.inc.header', function($view){
            $view->with('cats', Cat::all());
            $view->with('sett', Setting::select('logo', 'favicon')->first());
        });

        view()->composer('front.inc.footer', function($view){
            $view->with('sett', Setting::first());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
