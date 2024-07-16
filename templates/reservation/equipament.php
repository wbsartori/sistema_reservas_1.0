<?php

use App\Core\Session\Session;
use App\Core\View;

View::make()->load('layout/header');

?>
<div class="container">
    <h4 class="mt-5">Reservar/Equipamento</h4>
    <hr class="bg-dark">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="/rooms/created">
                <input type="hidden" class="form-control" maxlength="7" id="id" name="id"
                       value="<?= $registers->id ?? ''; ?>">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="id_usuario">ID usuário:</label>
                            <input type="text" class="form-control" maxlength="50" id="id_usuario" name="id_usuario"
                                   value="<?= Session::session()->getValue('user')['id'] ?? '' ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome_usuario">Usuário:</label>
                            <input type="text" class="form-control" maxlength="50" id="nome_usuario" name="nome_usuario"
                                   value="<?= Session::session()->getValue('user')['name'] ?? '' ?>" disabled>
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
                            <select class="form-select" id="horario" name="horario" aria-label="Default select example"
                                    required>
                                <option selected> ---</option>
                                <option value="07:00">07:00</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                                <option value="21:00">21:00</option>
                                <option value="22:00">22:00</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="equipamento_id">Equipamento:</label>
                            <select class="form-select" id="equipamento_id" name="equipamento_id"
                                    aria-label="Default select example" required>
                                <option selected> ---</option>
                                <?php
                                if (count($registers) > 0) {
                                    foreach ($registers as $equipament) {
                                        $equipaments .= '<option value="' . $equipament->id . '">' . $equipament->descricao . '</option>';
                                    }
                                }
                                echo $equipaments;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check form-switch">
                            <input class="form-input" type="hidden" id="tipo" name="tipo" value="room">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="id_perfil">Status:</label>
                    <div class="col-md-3">
                        <label for="status"></label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="status" name="status" disabled checked>
                            <label class="form-check-label" for="status" id="label_tipo_reserva">Reservado</label>
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
                <button class="btn btn-success mb-5 mt-5" type="submit">Salvar</button>
                <a href="/" class="btn btn-danger mb-5 mt-5">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php View::make()->load('layout/footer'); ?>
