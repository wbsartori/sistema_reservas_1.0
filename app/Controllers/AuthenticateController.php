<?php

namespace App\Controllers;

use App\Models\User;

class AuthenticateController
{
    /**
     * @var User
     */
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function authenticate()
    {
        $this->user->findById()
    }

    public function logout()
    {

    }
}