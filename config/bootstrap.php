<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use App\Core\App;
use App\Core\Env;
use App\Core\Session\Session;
use App\Providers\SystemProvider;
use Pimple\Container;

Session::make()->init();
Env::make();
$provider = new SystemProvider();
$provider->register(new Container());
App::run();
