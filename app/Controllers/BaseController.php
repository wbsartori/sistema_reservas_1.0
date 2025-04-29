<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Session\Session;
use App\Core\View;

class BaseController
{
    public function __construct()
    {
        $flag = Session::verifySessionExists();
        if(!$flag) {
            View::make()->redirect();
        }
    }
}
