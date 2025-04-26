<?php
\App\Core\View::make()->load('layout/header');
\App\Core\View::make()->alertMessage();
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Usuários</h4>
        <a href="/users/add" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Novo
        </a>
    </div>

    <hr class="bg-dark">

    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Ramal</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
                <th scope="col" class="text-center">Ações</th>
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
                        <span class="badge <?= $item->status === \App\Enums\StatusEnum::ATIVO->value ? 'bg-success' : 'bg-secondary' ?>">
                            <?= $item->status === \App\Enums\StatusEnum::ATIVO->value ? 'Ativo' : 'Inativo' ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <!-- Editar -->
                        <form action="/users/edit" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <button class="btn btn-sm btn-outline-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </form>

                        <!-- Deletar -->
                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $item->id ?>" title="Excluir">
                            <i class="bi bi-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal<?= $item->id ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Confirmação de exclusão</h5>
                                        <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza que deseja excluir o usuario
                                        <strong><?= $item->usuario ?></strong> (ID <?= $item->id ?>)?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/users/delete" method="post">
                                            <input type="hidden" name="id" value="<?= $item->id ?>">
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                            <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Cancelar
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
