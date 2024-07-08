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
//        $create = $this->equipament->insert(
//            [
//                'data_aquisicao' => filter_input(INPUT_POST, 'data_aquisicao', FILTER_SANITIZE_STRING),
//                'nota_compra' => filter_input(INPUT_POST, 'nota_compra', FILTER_SANITIZE_STRING),
//                'numero_patrimonio' => filter_input(INPUT_POST, 'numero_patrimonio', FILTER_SANITIZE_STRING),
//                'descricao' => filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING),
//                'equipamento_tipo' => filter_input(INPUT_POST, 'equipamento_tipo', FILTER_SANITIZE_STRING),
//                'equipamento_marca' => filter_input(INPUT_POST, 'equipamento_marca', FILTER_SANITIZE_STRING),
//                'modelo' => filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING),
//                'prazo_garantia_fabricante' => filter_input(INPUT_POST, 'prazo_garantia_fabricante', FILTER_SANITIZE_STRING),
//                'prazo_garantia_loja' => filter_input(INPUT_POST, 'prazo_garantia_loja', FILTER_SANITIZE_STRING),
//                'status' => filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING),
//                'observacoes' => filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING),
//            ]
//        );

        $this->equipament->insert($_POST);
        View::make()->template('equipaments/index');
    }

    public function update(): void
    {
        $delete = $this->equipament->update('id', $_POST['id']);
        $registers = $this->equipament->getAll();
        View::make()->template('equipaments/index', $registers);
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
        View::make()->template('equipaments/index', $registers);
    }
}
