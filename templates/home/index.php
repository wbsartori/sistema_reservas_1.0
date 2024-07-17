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
            <?php foreach ($registers as $item) { ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->descricao ?></td>
                    <?php if($item->tipo === 'room') { ?>
                    <td>Sala</td>
                    <?php } elseif($item->tipo === 'equipament') { ?>
                        <td>Equipamento</td>
                    <?php } elseif($item->tipo === 'vehicle') { ?>
                        <td>Veículo</td>
                    <?php } ?>
                    <td><?= $item->data ?></td>
                    <td><?= $item->horario ?></td>
                    <td>
                        <?php if ($item->status == 'on') { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_ativo" id="status_ativo">
                                    <label class="btn btn-success" for="status_ativo">Reservado</label>
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
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php \App\Core\View::make()->load('layout/footer'); ?>
