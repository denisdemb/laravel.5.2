<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Model\TopMenu;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //топ меню
         $topMenus = TopMenu::all()->toHierarchy();

         View::share('topMenus', $topMenus);

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
