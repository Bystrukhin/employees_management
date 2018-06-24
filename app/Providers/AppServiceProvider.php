<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


       Gate::define('isAdmin', function ($user) {

           if (Auth::check() && Auth::user()->admin){
               return true;
           }

           return false;

       });

        Gate::define('isEmployee', function ($user) {

            if (Auth::check() && !Auth::user()->admin){
                return true;
            }

            return false;

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
