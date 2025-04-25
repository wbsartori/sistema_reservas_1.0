<?php
\App\Core\View::make()->load('layout_login/header');
\App\Core\View::make()->alertMessage();
?>

<style>
    body {
        background: linear-gradient(135deg, #0d6efd, #6c757d);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-card {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    }

    .login-icon {
        font-size: 3rem;
        color: #0d6efd;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="login-card">
                <div class="text-center mb-4">
                    <i class="bi bi-person-circle login-icon"></i>
                    <h1 class="h4 mt-2">Sistema de Reservas</h1>
                    <p class="text-muted">Por favor, entre com seus dados</p>
                </div>

                <form action="/login/authenticate" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
                        <label for="usuario">Usuário</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                        <label for="senha">Senha</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="lembrar" name="lembrar">
                        <label class="form-check-label" for="lembrar">
                            Lembrar minha senha
                        </label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
                </form>

                <p class="mt-4 mb-0 text-center text-muted small">&copy; 2024 - Todos os direitos reservados</p>
            </div>
        </div>
    </div>
</div>

<?php \App\Core\View::make()->load('layout_login/footer'); ?>
