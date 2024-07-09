<?php \App\Core\View::make()->load('layout/header'); ?>
<div class="container">
    <h4 class="mt-5">Editar/Salas</h4>
    <hr class="bg-dark">
    <div class="row mt-5">
        <div class="col-md-12">
            <form method="post" action="/rooms/update">
                <input type="hidden" class="form-control" maxlength="7" id="id" name="id"
                       value="<?= $registers->id ?? ''; ?>">
                <?php include('_form.php'); ?>
                <button class="btn btn-success mb-5" type="submit">Salvar</button>
                <a href="/rooms" class="btn btn-danger mb-5">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php \App\Core\View::make()->load('layout/footer'); ?>
