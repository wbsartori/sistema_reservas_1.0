<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Equipament;
use App\Models\Vehicle;

class VehicleController
{

    private Vehicle $vehicle;

    public function __construct()
    {
        $this->vehicle = new Vehicle();
    }

    public function index(): void
    {
        $registers = $this->vehicle->getAll();
        View::make()->template('vehicles/index', $registers);
    }

    public function add(): void
    {
        View::make()->template('vehicles/new');
    }

    public function create(): void
    {
        $delete = $this->vehicle->insert('id', $_POST['id']);
        $registers = $this->vehicle->getAll();
        View::make()->template('vehicles/index', $registers);
    }

    public function update(): void
    {
        $delete = $this->vehicle->update('id', $_POST['id']);
        $registers = $this->vehicle->getAll();
        View::make()->template('vehicles/index', $registers);
    }

    public function edit(): void
    {
        $registers = $this->vehicle->findById($_POST['id']);
        View::make()->template('vehicles/editar', $registers);
    }

    public function delete(): void
    {
        $delete = $this->vehicle->delete('id', $_POST['id']);
        $registers = $this->vehicle->getAll();
        View::make()->template('vehicles/index', $registers);
    }
}
