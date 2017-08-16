<?php

namespace App\Modules\Themes;

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
        $theme = config('Themes.theme');

        foreach ((array) $paths as $path) {

            foreach ($this->getPossibleViewFiles($name) as $file) {

                if ($this->files->exists($viewPath = str_replace('{theme}', $theme, $path.'/'.$file))) {   
                    return $viewPath;
                }
            }
        }

        throw new \InvalidArgumentException("View [$name] not found.");
    }

}
