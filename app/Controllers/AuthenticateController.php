<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Session\Session;
use App\Core\View;
use App\Enums\StatusEnum;
use App\Global\Constants;
use App\Global\Messages;
use App\Models\Reservation;
use App\Models\User;
use Exception;

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

    /**
     * @return void
     * @throws Exception
     */
    public function authenticate(): void
    {
        if (count($_POST) === 0
            || (isset($_POST['usuario']) && $_POST['usuario'] === ''
                || isset($_POST['senha']) && $_POST['senha'] === '')
        ) {
            View::make()->redirect('/', [
                'status' => Constants::ERROR_STATUS,
                'message' => Messages::INVALID_USER_AND_PASSWORD_NOT_VALUES,
            ]);
            return;
        }
        $userExists = $this->user->meetWhere(
            [
                'usuario' => $_POST['usuario'],
                'senha' => $_POST['senha']
            ]
        );
        if (is_object($userExists) && $userExists->status === StatusEnum::ATIVO->value) {
            Session::init();
            Session::setKeys([
                'users' => [
                    'id' => $userExists->id,
                    'nome_completo' => $userExists->nome_completo,
                    'usuario' => $userExists->usuario,
                    'email' => $userExists->email,
                    'perfil' => $userExists->perfil,
                    'permissao' => [
                        'criar_equipamento' => $userExists->criar_equipamento,
                        'criar_sala' => $userExists->criar_sala,
                        'criar_veiculo' => $userExists->criar_veiculo,
                        'criar_usuario' => $userExists->criar_usuario,
                        'reservar_equipamento' => $userExists->reservar_equipamento,
                        'reservar_sala' => $userExists->reservar_sala,
                        'reservar_veiculo' => $userExists->reservar_veiculo,
                    ],
                ]
            ]);
            $registers = (new Reservation())->currentReservationsByUser(Session::getSession("users")['users']['id']);
            View::make()->redirect('/home', $registers);
            return;
        }

        View::make()->redirect('/', [
            'status' => Constants::ERROR_STATUS,
            'message' => Messages::INVALID_USER_AND_PASSWORD,
        ]);
        return;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        Session::destroy();
        View::make()->redirect();
    }
}