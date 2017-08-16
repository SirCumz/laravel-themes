<?php

namespace SirCumz\LaravelThemes;

use Illuminate\Support\ServiceProvider;

class LaravelThemesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Modules/Themes' => app_path('Modules/Themes'),
            __DIR__.'/Themes' => app_path('Themes'),
        ], 'themes');   
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
