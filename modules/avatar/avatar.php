<?php

class Avatar extends Module
{
    public function __init()
    {
        $this->addAlias('author_avatar', 'avatar_cache');
    }
    public function avatar_cache($avatar)
    {
        $url = Config::app('url');
        $t = 604800;
        if( preg_match('#src="(.+)"\s+#', $avatar, $matches) )
        {
            $avatar = $matches[1];
        }
        if( preg_match('#/avatar/(\w+)\?\w+#', $avatar, $matches) )
        {
            $name = $matches[1];
            $file = PATH . 'app/cache/avatar/'. $name . '.png';
            if( ! file_exists($file) or time() - fileatime($file) > $t )
            {
                copy($avatar, $file);
            }
            $avatar = $url . '/app/cache/avatar/' . $name . '.png';
        }
        return $avatar;
    }
}