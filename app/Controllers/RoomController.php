<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Room;

class RoomController
{

    private Room $room;

    public function __construct()
    {
        $this->room = new Room();
    }

    public function index(): void
    {
        $registers = $this->room->getAll();
        View::make()->template('rooms/index', $registers);
    }

    public function add(): void
    {
        View::make()->template('rooms/new');
    }

    public function create(): void
    {
        $delete = $this->room->insert('id', $_POST['id']);
        $registers = $this->room->getAll();
        View::make()->template('rooms/index', $registers);
    }

    public function update(): void
    {
        $delete = $this->room->update('id', $_POST['id']);
        $registers = $this->room->getAll();
        View::make()->template('rooms/index', $registers);
    }

    public function edit(): void
    {
        $registers = $this->room->findById($_POST['id']);
        View::make()->template('rooms/edit', $registers);
    }

    public function delete(): void
    {
        $delete = $this->room->delete('id', $_POST['id']);
        $registers = $this->room->getAll();
        View::make()->template('rooms/index', $registers);
    }
}
