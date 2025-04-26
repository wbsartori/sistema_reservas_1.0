<?php \App\Core\View::make()->load('layout/header'); ?>

<div class="container">
    <h4 class="mt-5">Cadastro/Usuarios</h4>
    <hr class="bg-dark">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form method="post" action="/users/update">
                <input type="hidden" id="id" name="id" value="<?= $registers->id ?? ''; ?>"/>
                <?php include('_form.php'); ?>
                <hr class="bg-dark">
                <button class="btn btn-success mb-5" type="submit">Salvar</button>
                <a href="/users" class="btn btn-danger mb-5">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php \App\Core\View::make()->load('layout/footer'); ?>
