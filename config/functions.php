<?php

use App\Providers\SystemProvider;
use Pimple\Container;

require dirname(__DIR__) . DIRECTORY_SEPARATOR .'vendor/autoload.php';

function container(string $key)
{
    $provider = new SystemProvider();
    $provider->register(new Container());
    return $provider::get($key);
}