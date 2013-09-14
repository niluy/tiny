<?php

class Avatar extends Module
{
	public static function __install()
	{
		
	}
	public static function __uninstall()
	{
		
	}
	public function __init()
	{
		add_filter('author_avatar', 'avatar_cache');
	}
}
