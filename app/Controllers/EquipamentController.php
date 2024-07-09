<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Equipament;

class EquipamentController
{

    private Equipament $equipament;

    public function __construct()
    {
        $this->equipament = new Equipament();
    }

    public function index(): void
    {
        $registers = $this->equipament->getAll();
        View::make()->template('equipaments/index', $registers);
    }

    public function add(): void
    {
        View::make()->template('equipaments/new');
    }

    public function create(): void
    {
        $this->equipament->insert($_POST);
        View::make()->redirect('/equipaments');
    }

    public function update(): void
    {
        $this->equipament->update($_POST);
        View::make()->redirect('/equipaments');
    }

    public function edit(): void
    {
        $registers = $this->equipament->findById($_POST['id']);
        View::make()->template('equipaments/edit', $registers);
    }

    public function delete(): void
    {
        $delete = $this->equipament->delete('id', $_POST['id']);
        $registers = $this->equipament->getAll();
        View::make()->redirect('/equipaments');
    }
}
