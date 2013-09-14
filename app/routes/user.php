<?php

Route::before('auth', function()
{
    if(Auth::check()) Redirect::to('admin');
});

Route::get('login', 'auth', function()
{
    return View::factory('admin')->render('login');
});

Route::post('login', function()
{
    $user = Input::post(array('login', 'pass', 'remember'));
    if (!Auth::attempt($user))
    {
        $vars['message'] = 'Login Error!';
        $vars['user'] = $user;
        return View::factory('admin')->render('login', $vars);
    }
    Redirect::to('admin');
});

Route::get('logout', function()
{
    Auth::logout();
    Redirect::to('/');
});