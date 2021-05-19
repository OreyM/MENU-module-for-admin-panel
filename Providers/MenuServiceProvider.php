<?php


namespace App\Containers\Admin\Menus\Providers;


use App\Containers\Core\Abstracts\Providers\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // routes
        $this->loadRoutesFrom( __DIR__.'/../UI/Routes/routes.php');
        // breadcrumbs
        $this->loadRoutesFrom( __DIR__.'/../UI/Routes/breadcrumbs.php');
        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Data/Migrations');
        // views
        $this->loadViewsFrom(__DIR__.'/../UI/Views', 'menus');
        // translations
        $this->loadTranslationsFrom(__DIR__.'/../UI/Langs', 'menus');
    }

    public function register()
    {
        // configs
        $this->mergeConfigFrom(
            __DIR__.'/../Configs/menus.php',
            'menus'
        );
    }
}
