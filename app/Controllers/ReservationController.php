<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Equipament;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Vehicle;
use Exception;

class ReservationController
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
}