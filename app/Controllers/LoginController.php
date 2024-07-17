<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Equipament;
use App\Models\User;

class LoginController
{
    public function index(): void
    {
        View::make()->template('login/index');
    }
}
