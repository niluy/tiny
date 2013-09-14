<?php

class Comments extends Module
{
    public static function __install()
    {

    }
    public static function __uninstall()
    {
        
    }
    public function __init()
    {
        $this->addAlias('comment_content', 'wpautop');
    }
}