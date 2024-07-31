<?php
\App\Core\View::make()->load('layout/header');
\App\Core\View::make()->alertMessage();
?>

<h4 class="mt-5">Veículos</h4>
<hr class="bg-dark">
<a href="/vehicles/add" class="btn btn-primary">Novo</a>
<hr class="bg-dark">
<div class="container-fluid">
    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descrição</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($registers as $item) { ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->veiculo_modelo ?></td>
                    <td class="text-center">
                        <?php if ($item->status === \App\Enums\StatusEnum::ATIVO->value) { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_ativo" id="status_ativo">
                                    <label class="btn btn-success" for="status_ativo">Ativo</label>
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
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/vehicles/edit" method="post">
                                <input type="hidden" class="btn-check" name="id" id="id"
                                       value="<?php echo $item->id ?? ''; ?>">
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confimarDelete<?= $item->id; ?>">
                                <i class="bi bi-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="confimarDelete<?= $item->id; ?>" data-bs-backdrop="static"
                                 data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title"
                                                id="staticBackdropLabel"><?= \App\Global\Messages::DELETE_CONFIRMATION_MESSAGE ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="id">Id:</label>
                                            <input type="text" class="form-control" id="id" name="id"
                                                   value="<?php echo $item->id; ?>" disabled>
                                            <hr>
                                            <label for="modelo">Descricao:</label>
                                            <input type="text" class="form-control" id="modelo" name="modelo"
                                                   value="<?php echo $item->veiculo_modelo; ?>" disabled>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/vehicles/delete" method="post">
                                                <input type="hidden" name="id" id="id" value="<?php echo $item->id ?>">
                                                <button type="submit" class="btn btn-warning">Confirmar<i
                                                            class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancelar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php \App\Core\View::make()->load('layout/footer'); ?>
