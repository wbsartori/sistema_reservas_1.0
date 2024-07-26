<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use Exception;

class UserController
{
    /**
     * @var User
     */
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        $registers = $this->user->getAll();
        View::make()->template('users/index', $registers);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function add(): void
    {
        View::make()->template('users/new');
    }

    /**
     * @return void
     */
    public function create(): void
    {
        $response = $this->user->insert($_POST);
        View::make()->redirect('/users', $response);
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $response = $this->user->update($_POST);
        View::make()->redirect('/users', $response);
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function edit(): void
    {
        $registers = $this->user->findById($_POST['id']);
        View::make()->template('users/edit', $registers);
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $response = $this->user->delete('id', $_POST['id']);
        View::make()->redirect('/users', $response);
    }
}
