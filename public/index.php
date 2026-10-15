<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if app is in maintenance mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registers Composer Auto Loader
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel, handle the incoming web request
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
