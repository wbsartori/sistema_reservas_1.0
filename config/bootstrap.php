<?php

use App\Core\App;
use App\Core\Session\Session;
use App\Providers\SystemProvider;
use Pimple\Container;

require dirname(__DIR__) . DIRECTORY_SEPARATOR .'vendor/autoload.php';

Session::init();
$provider = new SystemProvider();
$provider->register(new Container());
App::run();