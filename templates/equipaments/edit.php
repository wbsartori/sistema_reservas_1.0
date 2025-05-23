<?php \App\Core\View::make()->load('layout/header'); ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Editar Equipamento</h4>
        <a href="/equipaments" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form method="post" action="/equipaments/update">
                <input type="hidden" id="id" name="id" value="<?= $registers->id ?? ''; ?>" />
                <?php include('_form.php'); ?>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Salvar
                    </button>
                    <a href="/equipaments" class="btn btn-outline-danger">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php \App\Core\View::make()->load('layout/footer'); ?>
