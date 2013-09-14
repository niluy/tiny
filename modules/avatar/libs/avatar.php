<?php

function avatar_cache($avatar) {
    $url = 'http://kohana.chyrp.cn';
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

add_filter('author_avatar', 'avatar_cache');