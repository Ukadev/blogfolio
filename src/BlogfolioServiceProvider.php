<?php

namespace Ukadev\Blogfolio;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class BlogfolioServiceProvider extends ServiceProvider
{
    protected $redirectPath = '/panel';
    protected $commands = [
        'Ukadev\Blogfolio\Commands\InstallCommand',
        'Ukadev\Blogfolio\Commands\ReinstallCommand'
    ];


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Set the blogfolio commands
        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //load required resources
        $this->loadViewsFrom(__DIR__ . '/Views', 'blogfolio');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'blogfolio');


        // publish resources
        //$this->publishes([__DIR__ . '/Views' => resource_path('views/vendor/blogfolio')]);
        $this->publishes([__DIR__ . '/../public' => public_path('vendor/blogfolio')]);
        $this->publishes([__DIR__ . '/Seeders' => app_path('/../database/seeders')]);

        // load routes
        $this->loadRoutesFrom(__DIR__ . '/Routes.php');

    }
}
