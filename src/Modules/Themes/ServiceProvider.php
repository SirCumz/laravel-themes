<?php

namespace App\Modules\Themes;

use SirCumz\LaravelModular\ModuleServiceProvider;

class ServiceProvider extends ModuleServiceProvider
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
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        require_once( app_path('Modules/Themes/Helpers.php') );

        $this->mergeConfigFrom(
            'theme.php', 'Themes'
        );

        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            ExceptionHandler::class
        );

        $this->app->bind('view.finder', function ($app) {
            $paths = $app['config']['view.paths'];

            array_unshift( $paths, themes_path('default'));
            array_unshift( $paths, themes_path('{theme}'));

            config(['view.paths' => $paths]);

            return new FileViewFinder($app['files'], $app['config']['view.paths']);
        });   

        // Compose components to make sure that the HtmlAttributes object is always available
        $this->app['view']->composer('*component.*', function ($view) 
        {
            if(!isset($view->attributes))
            {
                $view->attributes = attributes();
            }
            elseif( is_array($view->attributes)  )
            {
                $view->attributes = attributes($view->attributes);
            }
        });      

    }
}