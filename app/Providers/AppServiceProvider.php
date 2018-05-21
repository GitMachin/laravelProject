<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
     
		/**
		 * Reliese
		 */
    if ($this->app->environment() == 'local') {
        $this->app->register(\Reliese\Coders\CodersServiceProvider::class);
    }
	
		/**
		 * Barryvdh\LaravelIdeHelper
		 */
    if ($this->app->environment() !== 'production') {
        $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
	
	
		/**
		 * Xethron/migrations-generator
		 */
    if ($this->app->environment() !== 'production') {
        $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
        $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
    }
    }
}
