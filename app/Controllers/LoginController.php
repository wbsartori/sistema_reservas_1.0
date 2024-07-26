<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use Exception;

class LoginController
{
    /**
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        View::make()->template('login/index');
    }
}
