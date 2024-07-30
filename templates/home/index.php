<?php
\App\Core\View::make()->load('layout/header');
\App\Core\View::make()->alertMessage();
?>

<h4 class="mt-5">Reservas</h4>
<hr class="bg-dark">
<div class="container-fluid">
    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descrição</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data</th>
                <th scope="col">Horário</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($registers as $item) { 
                

                ?>
                <tr>
                    <td><?= $item->reservas_id ?? '' ?></td>
                    <td><?= $item->reservas_descricao ??'' ?></td>
                    <?php if (isset($item->tipo) && $item->tipo === 'room') { ?>
                        <td>Sala</td>
                    <?php } elseif (isset($item->tipo) && $item->tipo === 'equipament') { ?>
                        <td>Equipamento</td>
                    <?php } elseif (isset($item->tipo) && $item->tipo === 'vehicle') { ?>
                        <td>Veículo</td>
                    <?php } ?>
                    <td><?= $item->reservas_data ??'' ?></td>
                    <td><?= $item->reservas_horario ?? '' ?></td>
                    <td>
                        <?php if (isset($item->reservas_status) && $item->reservas_status === \App\Enums\StatusEnum::APROVADO->value) { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_ativo" id="status_ativo">
                                    <label class="btn btn-success" for="status_ativo">Reservado</label>
                                </div>
                            </div>
                        <?php } else if (isset($item->reservas_status) && $item->reservas_status === \App\Enums\StatusEnum::AGUARDANDO->value) { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_ativo" id="status_ativo">
                                    <label class="btn btn-warning" for="status_ativo">Aguardando aprovação</label>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_inativo" id="status_inativo">
                                    <label class="btn btn-danger" for="status_inativo">Inativo</label>
                                </div>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ((isset($item->usuarios_perfil) && $item->usuarios_perfil === \App\Validator\ProfileStatus::ADMINISTRADOR->value) && $item->reservas_status === \App\Enums\StatusEnum::AGUARDANDO->value) { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_ativo" id="status_ativo">
                                    <label class="btn btn-success" for="status_ativo">Aprovar</label>
                                </div>
                            </div>
                        <?php } else if ((isset($item->usuarios_perfil) && $item->usuarios_perfil === \App\Validator\ProfileStatus::ADMINISTRADOR->value) && $item->reservas_status === \App\Enums\StatusEnum::APROVADO->value) { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_ativo" id="status_ativo">
                                    <label class="btn btn-success" for="status_ativo">Reprovar</label>
                                </div>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php \App\Core\View::make()->load('layout/footer'); ?>
