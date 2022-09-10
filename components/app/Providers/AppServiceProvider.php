<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Admin;
use App\Page;

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
        Schema::defaultStringLength(119);

        view::composer(['layouts.app', 'home', 'welcome', 'page', 'shortguest'], function($view){
            $view->with('admin', Admin::all()->first());
        });

        view::composer(['layouts.app'], function($view){
            $view->with('pages', Page::where('footer', '1')->get());
        });
    }
}
