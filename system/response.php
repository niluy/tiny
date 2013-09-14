<?php namespace System;

class Response
{
    public static function error($code='404')
    {
        echo View::factory('site')->render($code);
    }
}