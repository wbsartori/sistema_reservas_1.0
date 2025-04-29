<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Enums\StatusEnum;
use App\Models\Room;
use App\Validator\StatusValidator;
use Exception;

class RoomController extends BaseController
{

    /**
     * @var Room
     */
    private Room $room;

    public function __construct()
    {
        parent::__construct();
        $this->room = new Room();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        $registers = $this->room->getAll();
        View::make()->template('rooms/index', $registers);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function add(): void
    {
        View::make()->template('rooms/new');
    }

    /**
     * @return void
     */
    public function create(): void
    {
        $_POST['status'] = StatusEnum::ATIVO->value;
        $response = $this->room->insert($_POST);
        View::make()->redirect('/rooms', $response);
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $response = $this->room->update($_POST);
        View::make()->redirect('/rooms', $response);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function edit(): void
    {
        $registers = $this->room->findById($_POST['id']);
        View::make()->template('rooms/edit', $registers);
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $response = $this->room->delete('id', $_POST['id']);
        View::make()->redirect('/rooms', $response);
    }
}
