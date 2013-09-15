<?php

Route::get('/',function() {
    \System\Template::render();
});

Route::get('/home', function()
{
    $perpage = 5;
    $page = 1;
    $vars['posts'] = Post::where('post_type','=','post')
        ->where('post_status','=','publish')
        ->sort('post_date','desc')
        ->take($perpage)
        ->skip(($page - 1) * $perpage)
        ->get();
    return View::factory('site')->render('index', $vars);
});

Route::get('page/:page', function($page = 1)
{
    $perpage = 5;
    //$page = 1;
    $vars['posts'] = Post::where('post_type','=','post')
        ->where('post_status','=','publish')
        ->sort('post_date','desc')
        ->take($perpage)
        ->skip(($page - 1) * $perpage)
        ->get();
    return View::factory('site')->render('index', $vars);
});

Route::get('post/:id', function($id)
{
    $vars['post'] = Post::where('ID','=',$id)->fetch();
    return View::factory('site')->render('post', $vars);
});

Route::post('comment', function()
{
    //$vars['post'] = Post::where('ID','=',$id)->fetch();
    return;// View::render('post', $vars);
});
/*
$urls['post'] = '(id)(slug)(year)(month)(day)';
$urls['page'] = '(name)';
$urls['category'] = '(cat)';
$urls['tag'] = '(tag)';
*/