<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Country;

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
        View::composer(['layouts.countries'], function ($view){
            $view->with('countries', Country::all());
        });

        View::composer(['blogger.blog_create_process.*'], function ($view){
            $view->with('categories', Category::all());
        });
    }
}
