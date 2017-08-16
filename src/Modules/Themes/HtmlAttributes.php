<?php

namespace App\Modules\Themes;

use Illuminate\Support\Fluent;

class HtmlAttributes extends Fluent {

    public function addClass($class)
    {
        $class = is_array($class) ? implode(' ', $class) : $class;

        $this->class = strlen($this->class) ? implode(' ', [$this->class, $class]) : $class;

        return $this;
    }

    public function prependClass($class)
    {
        $class = is_array($class) ? implode(' ', $class) : $class;

        $this->class = strlen($this->class) ? implode(' ', [$class, $this->class]) : $class;

        return $this;
    }

    public function add( $attr, $val )
    {
        $this->attributes[$attr] = $val;
    }

    public function __toString()
    {
        $string = '';

        foreach($this->attributes as $key => $val)
        {
            if(is_int($key)) $string.= ' ' . $val;
            elseif(starts_with($key, ':') && is_numeric($val)) $string.= ' ' .$key . '=' . $val; // veujs integers
            else $string.= ' ' .$key . '="' . $val . '"';
        }

        return trim($string);
    }
}
