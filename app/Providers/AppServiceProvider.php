<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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

        DB::listen(function ($q){
            logger($q->sql);
        });

//        View::share("myname","Min Hein Ko Ko");
//
//        View::share("categories", Category::latest("id")->get());

        View::composer([
            "index",
            "detail",
            "post.create",
            "post.edit"
        ], function ($view){
            $view->with('categories',Category::latest('id')->get());
        });

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
        Blade::if("trash", function (){
            return request()->trash == 1;
        });

        Blade::if("notrash", function (){
            return request()->trash == 0;
        });

    }
}
