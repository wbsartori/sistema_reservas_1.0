<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Enums\StatusEnum;
use App\Global\Constants;
use App\Models\User;
use Exception;

class UserController extends BaseController
{
    /**
     * @var User
     */
    private User $user;

    public function __construct()
    {
        parent::__construct();
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
        $_POST['status'] = StatusEnum::ATIVO->value;
        $_POST['reservar_equipamento'] = isset($_POST['reservar_equipamento']) && $_POST['reservar_equipamento'] === 'on' ? 'S' : 'N';
        $_POST['reservar_sala'] = isset($_POST['reservar_sala']) && $_POST['reservar_sala'] === 'on' ? 'S' : 'N';
        $_POST['reservar_veiculo'] = isset($_POST['reservar_veiculo']) && $_POST['reservar_veiculo'] === 'on' ? 'S' : 'N';
        $user = $this->user->findByEmail($_POST['email']);
        if (isset($user['email'])) {
            $response = $this->user->insert($_POST);
            View::make()->redirect('/users', $response);
        }
        View::make()->redirect('/users', [
            'status' => Constants::ERROR_STATUS,
            'message' => 'E-mail já cadastrado para outro usuário.'
        ]);
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $_POST['status'] = StatusEnum::ATIVO->value;
        $_POST['reservar_equipamento'] = isset($_POST['reservar_equipamento']) && $_POST['reservar_equipamento'] === 'on' ? 'S' : 'N';
        $_POST['reservar_sala'] = isset($_POST['reservar_sala']) && $_POST['reservar_sala'] === 'on' ? 'S' : 'N';
        $_POST['reservar_veiculo'] = isset($_POST['reservar_veiculo']) && $_POST['reservar_veiculo'] === 'on' ? 'S' : 'N';
        $_POST['criar_equipamento'] = isset($_POST['criar_equipamento']) && $_POST['criar_equipamento'] === 'on' ? 'S' : 'N';
        $_POST['criar_sala'] = isset($_POST['criar_sala']) && $_POST['criar_sala'] === 'on' ? 'S' : 'N';
        $_POST['criar_usuario'] = isset($_POST['criar_usuario']) && $_POST['criar_usuario'] === 'on' ? 'S' : 'N';
        $_POST['criar_veiculo'] = isset($_POST['criar_veiculo']) && $_POST['criar_veiculo'] === 'on' ? 'S' : 'N';
        $user = $this->user->findById($_POST['id']);
        if ($user->email !== $_POST['email']) {
            $newUser = $this->user->findByEmail($_POST['email']);
            if(isset($newUser)) {
                View::make()->redirect('/users', [
                    'status' => Constants::ERROR_STATUS,
                    'message' => 'E-mail já cadastrado para outro usuário.'
                ]);
            }
        }
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
