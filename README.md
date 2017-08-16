laravel-modular!
===================
[![Latest Stable Version](https://poser.pugx.org/sircumz/laravel-themes/v/stable)](https://packagist.org/packages/SirCumz/laravel-themes) [![Total Downloads](https://poser.pugx.org/SirCumz/laravel-themes/downloads)](https://packagist.org/packages/SirCumz/laravel-themes) [![Latest Unstable Version](https://poser.pugx.org/SirCumz/laravel-themes/v/unstable)](https://packagist.org/packages/SirCumz/laravel-themes) [![License](https://poser.pugx.org/SirCumz/laravel-themes/license)](https://packagist.org/packages/SirCumz/laravel-themes)

A Laravel 5.4+ package for a theme based design.

----------

Installation
-------
The preferred way of installing is through composer

    composer require sircumz/laravel-themes

Add the service provider to config/app.php:

    SirCumz\LaravelModular\LaravelThemesServiceProvider::class

Publish the package

    php artisan vendor:publish --tag=themes

Navigate to "app/Themes" to view the **Default Theme**.

Compiling Theme Assets with laravel Mix
-------
