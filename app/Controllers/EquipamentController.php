<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Equipament;
use App\Validator\StatusValidator;
use Exception;

class EquipamentController
{

    /**
     * @var Equipament
     */
    private Equipament $equipament;

    public function __construct()
    {
        $this->equipament = new Equipament();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        $registers = $this->equipament->getAll();
        View::make()->template('equipaments/index', $registers);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function add(): void
    {
        View::make()->template('equipaments/new');
    }

    /**
     * @return void
     */
    public function create(): void
    {
        $_POST['status'] = StatusValidator::validateStatus('create');
        $response = (new \App\Models\Equipament)->insert($_POST);
        View::make()->redirect('/equipaments', $response);
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $response = $this->equipament->update($_POST);
        View::make()->redirect('/equipaments', $response);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function edit(): void
    {
        $registers = $this->equipament->findById($_POST['id']);
        View::make()->template('equipaments/edit', $registers);
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $response = $this->equipament->delete('id', $_POST['id']);
        View::make()->redirect('/equipaments', $response);
    }
}
