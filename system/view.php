<?php namespace System;

use Exception;
use System\Template\Loader;

class View
{
    public static $site = null;
    public static $admin = null;
    public static $vars = array();
    public $name;
    public function __construct($name = '')
    {
        if(is_null(static::$$name)) {
            $theme = Config::app('themes.'.$name);
            $path = THEME.$theme.'/views';
            if (!$theme) {
                $path = APP.'views';
            }
            static::$$name = new Loader(array(
                'mode' => 0,
                'source' => $path,
                'target' => APP.'cache/templates',
            ));
        }
        $this->name = $name;
    }
    public static function factory($name = 'site') {
        return new static($name);
    }
    public function render($file, $vars = array())
    {
        $name = $this->name;
        $vars = array_merge(static::$vars, $vars);
        try {
            $template = static::$$name->load($file.'.html');
            $template->display($vars);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request {$e->getMessage()}", 1);
        }
    }
}