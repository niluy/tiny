<?php namespace System;

abstract class Module
{
    protected function setPriority($name, $priority)
    {
    }
    protected function addAlias($name, $function, $priority = 10)
    {
        add_filter($name, array(get_called_class(), $function), $priority);
    }
}