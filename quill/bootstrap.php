<?php namespace System;

//if (Auth::check()) 

Module::addAdmin();

Module::add('comments');
Module::addSite();

Filter::add('post_content', 'wpautop');

add_global('blog', Config::get('app'));

add_global('current_user', Auth::user());