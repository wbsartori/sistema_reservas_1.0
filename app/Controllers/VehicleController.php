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
        $this->vehicle->insert($_POST);
        View::make()->redirect('/vehicles');
    }

    public function update(): void
    {
        $this->vehicle->update($_POST);
        View::make()->redirect('/vehicles');
    }

    public function edit(): void
    {
        $registers = $this->vehicle->findById($_POST['id']);
        View::make()->template('vehicles/edit', $registers);
    }

    public function delete(): void
    {
        $this->vehicle->delete('id', $_POST['id']);
        View::make()->redirect('/vehicles');
    }
}
