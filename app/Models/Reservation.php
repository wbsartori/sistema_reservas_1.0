<?php

namespace App\Models;

use App\Core\Database\Model;
use App\Core\Session\Session;

class Reservation extends Model
{
    protected string $table = 'reservas';

    /**
     * @param int $userId
     * @return bool|array
     */
    public function currentReservationsByUser(int $userId): bool|array
    {
        return $this->query('
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
            WHERE reservas.usuario_id = ' . $userId . '
        ');
    }
}
