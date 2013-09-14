<?php

Route::get('admin', function() {
    return View::factory('admin')->render('dashboard');
});

Route::get('admin/post/new', function() {
    return View::factory('admin')->render('compose');
});

Route::get('admin/post/edit/:id', function($id) {
    $vars['post'] = Post::where('ID','=',$id)->fetch();
    return View::factory('admin')->render('compose', $vars);
});

Route::get('admin/post/delete/:id', function($id) {
    Post::delete($id);
    return Redirect::to('posts');
});