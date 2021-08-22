<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Config;
use App\Models\Category;
use App\Models\Field;


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
        Paginator::useBootstrap();
        View::share('appAndroid', Config::find(1)->content);
        View::share('appIos', Config::find(2)->content);
        View::share('hotCategories', Category::orderBy('total_jobs', 'desc')->limit(10)->get());
        View::share('hotFields', Field::orderBy('total_companies', 'desc')->limit(10)->get());
    }
}
