<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\Error404Controller;
use App\Core\Session\Session;
use Exception;

class Routes
{
    /**
     * @return mixed
     * @throws Exception
     */
    public static function load(): mixed
    {
        $routes = require dirname(__DIR__, 2) . '/routes/web.php';
        $uri = Uri::load();
        if(!array_key_exists($uri, $routes)) {
            $controller = new Error404Controller();
            return $controller->index();
        }
        if(!class_exists($routes[$uri]['controller'])) {
            throw new Exception('Controller not found!');
        }
        Session::init();
        $controller = new $routes[$uri]['controller'];
        $method = $routes[$uri]['method'];
        return $controller->$method();
    }
}