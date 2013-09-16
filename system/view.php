<?php namespace System;

use Exception;
use System\Template\Loader;

class View
{
    public static $loader = null;
    public static $vars = array();
    public $from;
    public function __construct($from = null)
    {
        $this->from = $from;
    }
    public static function module($name = 'site') {
        if (is_null(static::$loader))
        {
            static::$loader = new Loader(array(
                'mode' => 0,
                'source' => THEME.'default/views',
                'target' => APP.'cache/templates',
            ));
        }
        switch ($name) {
            case 'site':
                $from = null;
                break;
            case 'admin':
                $from = APP.'views';
                break;
            default:
                echo $from = MODULE . $name . '/views';
                break;
        }
        return new static($from);
    }
    public function render($file, $vars = array())
    {
        $vars = array_merge(static::$vars, $vars);
        try {
            $template = static::$loader->load($file, $this->from);
            $template->display($vars);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request {$e->getMessage()}", 1);
        }
    }
    public static function addGlobal($tag, $value)
    {
        static::$vars[$tag] = $value;
    }
    public static function __callStatic($module, $arguments)
    {
        if (is_null(static::$loader))
        {
            static::$loader = new Loader(array(
                'mode' => 0,
                'source' => THEME.'default/views',
                'target' => APP.'cache/templates',
            ));
        }
        switch ($module) {
            case 'site':
                $from = null;
                break;
            case 'admin':
                $from = APP.'views';
                break;
            default:
                $from = MODULE . $module . '/views';
                break;
        }
        try {
            $template = static::$loader->load(array_shift($arguments), $from);
            $vars = array_merge(static::$vars, array_shift($arguments));
            $template->display($vars);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request {$e->getMessage()}", 1);
        }
    }
}