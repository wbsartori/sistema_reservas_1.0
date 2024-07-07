<?php \App\Core\View::make()->load('layout/header');?>
<div class="container">
    <h4 class="mt-5">Cadastro/Usuario</h4>
    <hr class="bg-dark">
    <div class="row mt-5">
        <div class="col-md-12">
            <form method="post" action="/users/create">
                <?php include('_form.php'); ?>
                <hr class="bg-dark">
                <button class="btn btn-success" type="submit">Salvar</button>
                <a href="/users" class="btn btn-danger">Cancelar</a>
                <hr>
            </form>
        </div>
    </div>
</div>
<?php \App\Core\View::make()->load('layout/footer');?>

