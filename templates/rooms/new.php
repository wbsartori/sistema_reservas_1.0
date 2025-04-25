<?php \App\Core\View::make()->load('layout/header'); ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Cadastro de Sala</h4>
        <a href="/rooms" class="btn btn-danger">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>

    <hr class="bg-dark">

    <div class="row">
        <div class="col-md-12">
            <form method="post" action="/rooms/create">
                <?php include('_form.php'); ?>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-success mb-5" type="submit">
                        <i class="bi bi-save me-1"></i> Salvar
                    </button>
                    <a href="/rooms" class="btn btn-danger mb-5 ms-2">
                        <i class="bi bi-x-lg me-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php \App\Core\View::make()->load('layout/footer'); ?>
