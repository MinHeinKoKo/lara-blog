<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        Blade::directive("myname", function (){
            return "Min Hein Ko Ko";
        });
        Blade::if("content", function (){
            return true;
        });
        Blade::if("admin", function (){
            return Auth::user()->role === "admin";
        });
        Blade::if("notAuthor", function (){
            return Auth::user()->role != "author";
        });
    }
}