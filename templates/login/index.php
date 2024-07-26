<?php
\App\Core\View::make()->load('layout_login/header');
\App\Core\View::make()->alertMessage();
?>

<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <main class="form-signin mt-5">
            <form action="/login/authenticate" method="post">
                <h1 class="h3 mb-3 fw-normal text-center">Sistema de reservas</h1>

                <div class="form-floating">
                    <label for="usuario"></label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="name@example.com">
                    <label for="floatingInput">Usuário</label>
                </div>
                <div class="form-floating">
                    <label for="senha"></label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    <label for="floatingPassword">Senha</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Lembrar minha senha
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
                <p class="mt-5 mb-3 text-muted text-center">&copy; 2024</p>
            </form>
        </main>
    </div>
    <div class="col-md-4"></div>
</div>
<?php \App\Core\View::make()->load('layout_login/footer'); ?>
