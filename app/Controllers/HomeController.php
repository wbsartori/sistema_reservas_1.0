<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Reservation;

class HomeController
{
    private Reservation $reservation;

    public function __construct()
    {
        $this->reservation = new Reservation();
    }

    public function index(): void
    {
        $registers = $this->reservation->getAll();
        View::make()->template('home/index', $registers);
    }
}