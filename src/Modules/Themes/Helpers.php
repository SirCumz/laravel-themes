<?php

if(!function_exists("themes_path")) {
    function themes_path($path = '') {
        return app_path('Themes').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }    
}

if(!function_exists("theme_asset")) {
    function theme_asset( $path, $secure = false, $theme = null ) {
        $theme = $theme ?: config('Themes.theme');

        return asset( 'themes/' . $theme . '/' . $path, $secure );
    }
}

if(!function_exists("theme_mix")) {
    function theme_mix( $path, $theme = null ) {
        $theme = $theme ?: config('Themes.theme');

        return mix( '/themes' . '/' . $theme . '/' . $path );
    }
}

if(!function_exists("set_theme")) {
    function set_theme($theme) {
        config(['Themes.theme' => $theme]);
    }
}

if(!function_exists("get_theme")) {
    function get_theme() {
        return config('Themes.theme', 'default');
    }
}

if(!function_exists("attributes")) {
    function attributes($attr = []){
        return new \App\Modules\Themes\HtmlAttributes($attr);
    }    
}
