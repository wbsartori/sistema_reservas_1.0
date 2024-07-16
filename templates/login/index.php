<?php \App\Core\View::make()->load('layout_login/header');?>

<main class="form-signin mt-5">
    <form action="/login/authenticate" method="post">
        <h1 class="h3 mb-3 fw-normal">Sistema de reservas</h1>

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
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
</main>
<!--<div class="sidenav">-->
<!--    <div class="login-main-text">-->
<!--        <h2>Sistema de Reservas</h2>-->
<!--        <p>Faça login ou entre em contato com o TI para se registrar.</p>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="main">-->
<!--    <div class="col-md-6 col-sm-12">-->
<!--        <div class="login-form">-->
<!--            <form method="POST" action="/users/authenticate">-->
<!--                <div class="form-group">-->
<!--                    <label for="usuario_nome">E-mail/Usuario</label>-->
<!--                    <input type="text" class="form-control" id="usuario_nome" name="usuario_nome" placeholder="E-mail/Usuário">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="usuario_senha">Senha</label>-->
<!--                    <input type="password" class="form-control" id="usuario_senha" name="usuario_senha" placeholder="Senha">-->
<!--                </div>-->
<!--                <div class="d-grid gap-2 mt-2">-->
<!--                    <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<div class="fixed-bottom">-->
<!--    <div class="card-footer text-muted">-->
<!--        <p class="text-center">© Copyright 2021 wbsartori.com.br - Todos os direitos reservados. Wesley Sartori</p>-->
<!--    </div>-->
<!--</div>-->

<?php \App\Core\View::make()->load('layout_login/footer');?>
