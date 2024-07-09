<?php \App\Core\View::make()->load('layout/header'); ?>
<div class="container">
    <h4 class="mt-5">Cadastro/Salas</h4>
    <hr class="bg-dark">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="/rooms/create">
                <?php include('_form.php'); ?>
                <hr>
                <button class="btn btn-success" type="submit">Salvar</button>
                <a href="/rooms" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php \App\Core\View::make()->load('layout/footer'); ?>
