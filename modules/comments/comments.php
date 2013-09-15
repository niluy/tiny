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
        $this->addModuleUI('comments', 'commentlist');
    }
    public function commentlist( $pid = 0 )
    {
        $vars['comments'] = Comment::getByPostId($pid);
        return $this->render('comments', $vars);
    }
    public function comment( $cid = 0 )
    {
        //$vars = array();
        //$this->render('comment', $vars);
    }
}