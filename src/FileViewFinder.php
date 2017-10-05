<?php

namespace SirCumz\LaravelThemes;

use Illuminate\View\FileViewFinder as BaseFileViewFinder;

class FileViewFinder extends BaseFileViewFinder
{

    /**
     * Find the given view in the list of paths.
     *
     * @param  string  $name
     * @param  array   $paths
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    protected function findInPaths($name, $paths)
    {  
        $theme = config('theme.theme');

        foreach ((array) $paths as $path) {

            foreach ($this->getPossibleViewFiles($name) as $file) {

                if ($this->files->exists($viewPath = str_replace('{theme}', $theme, $path.'/'.$file))) {   
                    return $viewPath;
                }
            }
        }

        throw new \InvalidArgumentException("View [$name] not found.");
    }

    /**
     * Replace the namespace hints for the given namespace.
     *
     * @param  string  $namespace
     * @param  string|array  $hints
     * @return void
     */
    public function replaceNamespace($namespace, $hints)
    {
        $hints = (array) $hints;

        if($namespace == 'errors') {
            array_unshift( $hints, themes_path('{theme}/errors'), themes_path('default/errors') );
        }

        $this->hints[$namespace] = $hints;
    }

}
