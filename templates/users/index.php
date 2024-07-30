<?php
\App\Core\View::make()->load('layout/header');
\App\Core\View::make()->alertMessage();
?>

<h4 class="mt-5">Usuários</h4>
<hr class="bg-dark">
<a href="/users/add" class="btn btn-primary">Novo</a>
<hr class="bg-dark">
<div class="container-fluid">
    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Ramal</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($registers as $item) { ?>
                <tr>
                    <td><?php echo $item->id ?></td>
                    <td><?php echo $item->nome_completo ?></td>
                    <td><?php echo $item->email ?></td>
                    <td><?php echo $item->contato ?></td>
                    <td>
                        <?php if ($item->status === \App\Enums\StatusEnum::ATIVO->value) { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_ativo" id="status_ativo"
                                           autocomplete="off" checked>
                                    <label class="btn btn-success" for="status_ativo">Ativo</label>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_inativo" id="status_inativo"
                                           autocomplete="off" checked>
                                    <label class="btn btn-danger" for="status_inativo">Inativo</label>
                                </div>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
                        <div class="btn-group float-end" role="group" aria-label="Basic example">
                            <form action="/users/edit" method="post">
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
                                            <h5 class="modal-title" id="staticBackdropLabel">Excluir</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo \App\Global\Messages::DELETE_CONFIRMATION_MESSAGE ?></p>
                                            <label for="veiculo_tipo_id">Id:</label>
                                            <input type="text" class="form-control" id="id" name="id"
                                                   value="<?php echo $item->id; ?>" disabled>
                                            <hr>
                                            <label for="nome">Nome:</label>
                                            <input type="text" class="form-control" id="nome" name="nome"
                                                   value="<?php echo $item->nome_completo; ?>" disabled>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/users/delete" method="post">
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
