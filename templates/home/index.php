<?php
\App\Core\View::make()->load('layout/header');
//\App\Core\View::make()->alertMessage();
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Reservas</h4>
        <a href="/reservations/add" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nova Reserva
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Horário</th>
                <th class="text-center">Status</th>
                <th class="text-end">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($registers as $item): ?>
                <tr>
                    <td><?= $item->reservas_id ?? '' ?></td>
                    <td><?= $item->reservas_descricao ?? '' ?></td>
                    <td>
                        <?php
                        if (isset($item->tipo)) {
                            echo match($item->tipo) {
                                'room' => 'Sala',
                                'equipament' => 'Equipamento',
                                'vehicle' => 'Veículo',
                                default => '-',
                            };
                        }
                        ?>
                    </td>
                    <td><?= $item->reservas_data ?? '' ?></td>
                    <td><?= $item->reservas_horario ?? '' ?></td>
                    <td class="text-center">
                            <span class="badge <?= $item->reservas_status === \App\Enums\StatusEnum::APROVADO->value ? 'bg-success' : ($item->reservas_status === \App\Enums\StatusEnum::AGUARDANDO->value ? 'bg-warning' : 'bg-danger') ?>">
                                <?= ucfirst($item->reservas_status) ?>
                            </span>
                    </td>
                    <td class="text-end">
                        <!-- Aprovar / Cancelar -->
                        <?php if (isset($item->usuarios_perfil) && $item->usuarios_perfil === \App\Validator\ProfileStatus::ADMINISTRADOR->value): ?>
                            <?php if ($item->reservas_status === \App\Enums\StatusEnum::AGUARDANDO->value): ?>
                                <form action="/reservations/approved" method="post" class="d-inline">
                                    <input type="hidden" name="_id" value="<?= $item->reservas_id ?>">
                                    <button class="btn btn-sm btn-outline-success" title="Aprovar">
                                        <i class="bi bi-check2"></i>
                                    </button>
                                </form>
                                <form action="/reservations/canceled" method="post" class="d-inline">
                                    <input type="hidden" name="_id" value="<?= $item->reservas_id ?>">
                                    <button class="btn btn-sm btn-outline-danger" title="Cancelar">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </form>
                            <?php elseif ($item->reservas_status === \App\Enums\StatusEnum::APROVADO->value): ?>
                                <form action="/reservations/canceled" method="post" class="d-inline">
                                    <input type="hidden" name="_id" value="<?= $item->reservas_id ?>">
                                    <button class="btn btn-sm btn-outline-danger" title="Cancelar">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($registers)): ?>
                <tr>
                    <td colspan="7" class="text-center text-muted">Nenhuma reserva encontrada.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php \App\Core\View::make()->load('layout/footer'); ?>
