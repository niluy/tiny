<?php namespace System;

abstract class Module
{
    protected function setPriority($name, $priority)
    {
    }
    protected function addAlias($name, $function, $priority = 10)
    {
        add_filter($name, array(new static, $function), $priority);
    }
    protected function addModuleUI($module, $function)
    {
        add_module_ui($module, array(new static, $function));
    }
    protected function render($template, $vars = array())
    {
        return View::factory('site')->render($template, $vars);
    }
}