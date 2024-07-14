<?php

use App\Core\App;
use App\Providers\SystemProvider;
use Pimple\Container;

require dirname(__DIR__) . DIRECTORY_SEPARATOR .'vendor/autoload.php';

#Providers to classes
$provider = new SystemProvider();
$provider->register(new Container());

#Initialize Application
App::run();