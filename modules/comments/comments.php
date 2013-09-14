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
		add_filter('post_content', 'wpautop');
		add_filter('comment_content', 'wpautop');
	}
}