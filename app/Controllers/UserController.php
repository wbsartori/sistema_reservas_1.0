<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Equipament;
use App\Models\User;

class UserController
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index(): void
    {
        $registers = $this->user->getAll();
        View::make()->template('users/index', $registers);
    }

    public function add(): void
    {
        View::make()->template('users/new');
    }

    public function create(): void
    {
        $this->user->insert($_POST);
        View::make()->redirect('/users');
    }

    public function update(): void
    {
        $delete = $this->user->update($_POST);
        View::make()->redirect('/users');
    }

    public function edit(): void
    {
        $registers = $this->user->findById($_POST['id']);
        View::make()->template('users/edit', $registers);
    }

    public function delete(): void
    {
        $this->user->delete('id', $_POST['id']);
        View::make()->redirect('/users');
    }
}
