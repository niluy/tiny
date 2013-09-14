<?php namespace System;

class ORM
{
    public static function factory($class)
    {
        $class = ucfirst($class);
        $class = "\\System\\Model\\$class";
        return new $class();
    }
}