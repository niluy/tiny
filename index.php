<?php

define('START_TIME', microtime(true));
define('START_MEMORY', memory_get_usage(true));

define('DS', DIRECTORY_SEPARATOR);
define('ENV', getenv('APP_ENV'));
define('PATH', __DIR__.DS);   // dirname(__FILE__)
define('SYS', PATH.'system'.DS);
define('APP', PATH.'quill'.DS);
define('THEME', PATH.'themes'.DS);
define('MODULE', PATH.'modules'.DS);
define('EXT', '.php');

require_once SYS.'start'.EXT;