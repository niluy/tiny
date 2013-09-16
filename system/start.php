<?php namespace System;

date_default_timezone_set('PRC');

$start = microtime(true);

require_once SYS . 'autoloader' . EXT;

Autoloader::register();

Autoloader::$aliases = Config::get('aliases', array());

Error::register();

require_once SYS . 'helpers' . EXT;

require_once SYS . 'functions' . EXT;

require_once APP . 'bootstrap' . EXT;

$end = round((microtime(true) - $start), 5);

Session::load();

Route::run();