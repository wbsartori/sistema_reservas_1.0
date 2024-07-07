<?php \App\Core\View::make()->load('layout/header'); ?>

<div class="container">
    <h4 class="mt-5">Cadastro/Equipamentos</h4>
    <hr class="bg-dark">
    <div class="row mt-5">
        <div class="col-md-12">
            <form method="post" action="/vehicles/update">
                <input type="hidden" class="form-control" maxlength="7" id="id" name="id"
                       value="<?= $equipamento['id'] ?? ''; ?>">
                <?php include('./_form.php'); ?>
                <hr class="bg-dark">
                <button class="btn btn-success" type="submit">Salvar</button>
                <a href="/vehicles" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php \App\Core\View::make()->load('layout/footer'); ?>
