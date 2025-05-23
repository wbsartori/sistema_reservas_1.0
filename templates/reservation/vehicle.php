<?php

use App\Core\Session\Session;
use App\Core\View;

View::make()->load('layout/header');

?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Reservar/Veículo</h4>
        <a href="/home" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>
    <hr class="bg-dark">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="/reservations/created">
                        <input type="hidden" class="form-control" maxlength="7" id="id" name="id"
                               value="<?= $registers->id ?? ''; ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="usuario_id">ID usuário:</label>
                                    <input type="text" class="form-control" maxlength="50" id="usuario_id"
                                           name="usuario_id"
                                           value="<?= Session::getSession('users')['users']['id'] ?? '' ?>" disabled>
                                    <input type="hidden" class="form-control" maxlength="50" id="usuario_id"
                                           name="usuario_id"
                                           value="<?= Session::getSession('users')['users']['id'] ?? '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nome_usuario">Usuário:</label>
                                    <input type="text" class="form-control" maxlength="50" id="nome_usuario"
                                           name="nome_usuario"
                                           value="<?= Session::getSession('users')['users']['nome_completo'] ?? '' ?>"
                                           disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="descricao">Descrição:</label>
                                    <input type="text" class="form-control" maxlength="50" id="descricao"
                                           name="descricao">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data">Data:</label>
                                    <input type="date" class="form-control" id="data" name="data" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="horario">Horario:</label>
                                    <select class="form-select" id="horario" name="horario"
                                            aria-label="Default select example"
                                            required>
                                        <option selected> ---</option>
                                        <option value="07:00 às 08:00">07:00 às 08:00</option>
                                        <option value="08:00 às 09:00">08:00 às 09:00</option>
                                        <option value="09:00 às 10:00">09:00 às 10:00</option>
                                        <option value="10:00 às 11:00">10:00 às 11:00</option>
                                        <option value="11:00 às 12:00">11:00 às 12:00</option>
                                        <option value="12:00 às 13:00">12:00 às 13:00</option>
                                        <option value="13:00 às 14:00">13:00 às 14:00</option>
                                        <option value="14:00 às 15:00">14:00 às 15:00</option>
                                        <option value="15:00 às 16:00">15:00 às 16:00</option>
                                        <option value="16:00 às 17:00">16:00 às 17:00</option>
                                        <option value="17:00 às 18:00">17:00 às 18:00</option>
                                        <option value="18:00 às 19:00">18:00 às 19:00</option>
                                        <option value="19:00 às 20:00">19:00 às 20:00</option>
                                        <option value="20:00 às 21:00">20:00 às 21:00</option>
                                        <option value="21:00 às 22:00">21:00 às 22:00</option>
                                        <option value="22:00 às 23:00">22:00 às 23:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sala_id">Veículo:</label>
                                    <select class="form-select" id="sala_id" name="sala_id"
                                            aria-label="Default select example"
                                            required>
                                        <option selected> ---</option>
                                        <?php
                                        if (count($registers) > 0) {
                                            foreach ($registers as $vehicle) {
                                                $vehicles .= '<option value="' . $vehicle->id . '">' . $vehicle->descricao . '</option>';
                                            }
                                        }
                                        echo $vehicles;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check form-switch">
                                    <input class="form-input" type="hidden" id="tipo" name="tipo" value="vehicle">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="id_perfil">Status:</label>
                            <div class="col-md-3">
                                <label for="status"></label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" disabled
                                           checked>
                                    <label class="form-check-label" for="status"
                                           id="label_tipo_reserva">Reservado</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <label for="observacoes">Observações: </label>
                                <div class="form-floating">
                            <textarea class="form-control" id="observacoes" name="observacoes"
                                      placeholder="Leave a comment here" style="height: 100px"></textarea>
                                    <label for="observacoes">Escreva algo que queira destacar sobre a reserva:</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button class="btn btn-outline-success mb-5" type="submit">
                                <i class="bi bi-save me-1"></i> Salvar
                            </button>
                            <a href="/home" class="btn btn-outline-danger mb-5 ms-2">
                                <i class="bi bi-x-lg me-1"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php View::make()->load('layout/footer'); ?>
