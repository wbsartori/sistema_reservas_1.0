<?php \App\Core\View::make()->load('layout/header'); ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Cadastro de Veículos</h4>
        <a href="/vehicles" class="btn btn-danger">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>

    <hr class="bg-dark">

    <div class="row">
        <div class="col-md-12">
            <form method="post" action="/vehicles/update">
                <input type="hidden" class="form-control" maxlength="7" id="id" name="id"
                       value="<?= $registers->id ?? ''; ?>">
                <?php include('_form.php'); ?>
                <hr class="bg-dark">
                <button class="btn btn-success mb-5" type="submit">Salvar</button>
                <a href="/vehicles" class="btn btn-danger mb-5">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php \App\Core\View::make()->load('layout/footer'); ?>
