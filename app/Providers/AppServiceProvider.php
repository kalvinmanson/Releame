<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu;
use App\Link;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menu = Menu::all();
        view()->share('site_menus', $menu);
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
