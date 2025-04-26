<?php
\App\Core\View::make()->load('layout/header');
\App\Core\View::make()->alertMessage();
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Salas</h4>
        <a href="/rooms/add" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Novo
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Capacidade</th>
                <th class="text-center">Status</th>
                <th class="text-end">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($registers as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->descricao ?></td>
                    <td><?= $item->capacidade ?></td>
                    <td class="text-center">
                        <span class="badge <?= $item->status === \App\Enums\StatusEnum::ATIVO->value ? 'bg-success' : 'bg-secondary' ?>">
                            <?= $item->status === \App\Enums\StatusEnum::ATIVO->value ? 'Ativo' : 'Inativo' ?>
                        </span>
                    </td>
                    <td class="text-end">
                        <!-- Editar -->
                        <form action="/rooms/edit" method="post" class="d-inline">
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
                                        <h5 class="modal-title">Excluir Sala</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?= \App\Global\Messages::DELETE_CONFIRMATION_MESSAGE ?>
                                        <hr>
                                        <p><strong>ID:</strong> <?= $item->id ?></p>
                                        <p><strong>Descrição:</strong> <?= $item->descricao ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/rooms/delete" method="post">
                                            <input type="hidden" name="id" value="<?= $item->id ?>">
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php \App\Core\View::make()->load('layout/footer'); ?>
