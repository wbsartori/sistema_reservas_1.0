<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Enums\StatusEnum;
use App\Global\Messages;
use App\Models\Equipament;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Vehicle;
use Exception;

class ReservationController extends BaseController
{
    /**
     * @var Reservation
     */
    private Reservation $reservation;
    private Equipament $equipament;
    private Room $room;
    private Vehicle $vehicle;

    public function __construct()
    {
        parent::__construct();
        $this->reservation = new Reservation();
        $this->equipament = new Equipament();
        $this->room = new Room();
        $this->vehicle = new Vehicle();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function addEquipament(): void
    {
        $equipaments = $this->equipament->getAll();
        View::make()->template('reservation/equipament', $equipaments);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function addRoom(): void
    {
        $rooms = $this->room->getAll();
        View::make()->template('reservation/room', $rooms);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function addVehicle(): void
    {
        $vehicles = $this->vehicle->getAll();
        View::make()->template('reservation/vehicle', $vehicles);
    }

    /**
     * @return void
     */
    public function create(): void
    {
        $status = StatusEnum::AGUARDANDO;
        $_POST['status'] = $status->value;
        unset($_POST['nome_usuario']);
        $response = (new \App\Models\Reservation())->insert($_POST);
        View::make()->redirect('/home', $response);
    }

    /**
     * @return void
     */
    public function canceled(): void
    {
        $reservation = $this->reservation->query('SELECT * FROM reservas WHERE id = ' . $_POST['_id'])[0];
        $_POST = array(
            'id' => $reservation->id,
            'descricao' => $reservation->descricao,
            'tipo' => $reservation->tipo,
            'usuario_id' => $reservation->usuario_id,
            'equipamento_id' => $reservation->equipamento_id,
            'sala_id' => $reservation->sala_id,
            'data' => $reservation->data,
            'horario' => $reservation->horario,
            'observacoes' => $reservation->observacoes,
            'status' => StatusEnum::CANCELADO->value,
            'criado_em' => $reservation->criado_em,
            'alterado_em' => (new \DateTime())->format('Y-m-d H:i:s'),
        );
        $response = (new \App\Models\Reservation())->update($_POST);
        $response['message'] = Messages::CANCELED_MESSAGE;
        View::make()->redirect('/home', $response);
    }

    /**
     * @return void
     */
    public function approved(): void
    {
        $reservation = $this->reservation->query('SELECT * FROM reservas WHERE id = ' . $_POST['_id'])[0];
        $_POST = array(
            'id' => $reservation->id,
            'descricao' => $reservation->descricao,
            'tipo' => $reservation->tipo,
            'usuario_id' => $reservation->usuario_id,
            'equipamento_id' => $reservation->equipamento_id,
            'sala_id' => $reservation->sala_id,
            'data' => $reservation->data,
            'horario' => $reservation->horario,
            'observacoes' => $reservation->observacoes,
            'status' => StatusEnum::APROVADO->value,
            'criado_em' => $reservation->criado_em,
            'alterado_em' => (new \DateTime())->format('Y-m-d H:i:s'),
        );
        $response = (new \App\Models\Reservation())->update($_POST);
        $response['message'] = Messages::APROVED_MESSAGE;
        View::make()->redirect('/home', $response);
    }
}
