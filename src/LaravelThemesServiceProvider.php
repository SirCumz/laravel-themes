<?php

namespace SirCumz\LaravelThemes;

use SirCumz\LaravelModular\ModuleServiceProvider;

class LaravelThemesServiceProvider extends ModuleServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Themes' => app_path('Themes')
        ], 'themes');

        $files = $this->app['files'];

        $this->app['mixable']->mix(function($mix) use($files){
            if($files->exists( app_path('Themes') )) {
                foreach($files->directories( app_path('Themes') ) as $dir) {
                    if($files->exists($dir. '/mix.php')) {
                        include($dir. '/mix.php');                   
                    }        
                }   
            } 
        });                
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once(__DIR__ . '/helpers.php');

        $this->publishes([
            __DIR__.'/config/theme.php' => config_path('theme.php'),
        ]);

        $this->mergeConfigFrom(
            'theme.php', 'theme'
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
            if(!isset($view->attributes)) {
                $view->attributes = attributes();
            } elseif( is_array($view->attributes)  ) {
                $view->attributes = attributes($view->attributes);
            }
        });      
        
    }
}
