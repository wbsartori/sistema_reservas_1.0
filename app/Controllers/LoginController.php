<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Equipament;
use App\Models\User;

class LoginController
{

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index(): void
    {
        View::make()->template('login/index');
    }

    public function add(): void
    {
        View::make()->template('users/new');
    }

    public function create(): void
    {
        $delete = $this->user->insert('id', $_POST['id']);
        $registers = $this->user->getAll();
        View::make()->template('users/index', $registers);
    }

    public function update(): void
    {
        $delete = $this->user->update('id', $_POST['id']);
        $registers = $this->user->getAll();
        View::make()->template('users/index', $registers);
    }

    public function edit(): void
    {
        $registers = $this->user->findById($_POST['id']);
        View::make()->template('users/edit', $registers);
    }

    public function delete(): void
    {
        $delete = $this->user->delete('id', $_POST['id']);
        $registers = $this->user->getAll();
        View::make()->template('users/index', $registers);
    }
}
