<?php namespace System;

add_admin_module();

add_modules('comments', 'avatar');

add_site_theme();

add_global('blog', Config::get('app'));

add_global('current_user', Auth::user());

//add_filter('post_content', 'wpautop');