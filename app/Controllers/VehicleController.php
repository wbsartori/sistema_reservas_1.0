<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Vehicle;
use Exception;

class VehicleController
{
    /**
     * @var Vehicle
     */
    private Vehicle $vehicle;

    public function __construct()
    {
        $this->vehicle = new Vehicle();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        $registers = $this->vehicle->getAll();
        View::make()->template('vehicles/index', $registers);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function add(): void
    {
        View::make()->template('vehicles/new');
    }

    /**
     * @return void
     */
    public function create(): void
    {
        $response = $this->vehicle->insert($_POST);
        View::make()->redirect('/vehicles', $response);
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $response = $this->vehicle->update($_POST);
        View::make()->redirect('/vehicles', $response);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function edit(): void
    {
        $registers = $this->vehicle->findById($_POST['id']);
        View::make()->template('vehicles/edit', $registers);
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $response = $this->vehicle->delete('id', $_POST['id']);
        View::make()->redirect('/vehicles', $response);
    }
}
