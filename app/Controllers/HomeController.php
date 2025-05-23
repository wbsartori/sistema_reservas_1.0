<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Session\Session;
use App\Core\View;
use App\Models\Reservation;
use App\Validator\ProfileStatus;

class HomeController extends BaseController
{
    private Reservation $reservation;

    public function __construct()
    {
        parent::__construct();
        $this->reservation = new Reservation();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function index(): void
    {
        $id = isset(Session::getSession('users')['users']['id']) ? Session::getSession('users')['users']['id'] : '';
        $perfil = isset(Session::getSession('users')['users']['perfil']) ? Session::getSession('users')['users']['perfil'] : '';
        $where = 'WHERE reservas.usuario_id = ' . $id;
        if($perfil === ProfileStatus::ADMINISTRADOR->value) {
            $where = '';
        }

        $registers = $this->reservation->query('
            SELECT
                reservas.id as reservas_id,
                reservas.descricao as reservas_descricao,
                reservas.tipo as reservas_tipo,
                reservas.usuario_id as reservas_usuario_id,
                reservas.equipamento_id as reservas_equipamento_id,
                reservas.sala_id as reservas_sala_id ,
                reservas.data as reservas_data,
                reservas.horario as reservas_horario,
                reservas.status  as reservas_status,
                usuarios.status  as usuarios_status,
                usuarios.email as usuarios_email,
                usuarios.perfil as usuarios_perfil
            FROM reservas
                     LEFT JOIN usuarios ON usuarios.id = reservas.usuario_id
            '. $where . '
        ');
        View::make()->template('home/index', $registers);
    }
}
