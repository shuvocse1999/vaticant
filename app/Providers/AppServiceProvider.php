<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\website_info;
use App\Models\service_info;

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
        View::composer('*',function($view){
            $view->with('website_info',website_info::first());
            $view->with('service_first',service_info::where('status',1)->take(13)->get());
            $view->with('service_last',service_info::where('status',1)->skip(13)->take(13)->get());
            $view->with('service_third',service_info::where('status',1)->skip(26)->take(13)->get());
            $view->with('language',\Illuminate\Support\Facades\App::getLocale());
        });
    }
}
