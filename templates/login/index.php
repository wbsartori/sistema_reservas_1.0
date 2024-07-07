<?php \App\Core\View::make()->load('layout_login/header');?>

<div class="sidenav">
    <div class="login-main-text">
        <h2>Sistema de Reservas</h2>
        <p>Faça login ou entre em contato com o TI para se registrar.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form method="POST" action="/users/authenticate">
                <div class="form-group">
                    <label for="usuario_nome">E-mail/Usuario</label>
                    <input type="text" class="form-control" id="usuario_nome" name="usuario_nome" placeholder="E-mail/Usuário">
                </div>
                <div class="form-group">
                    <label for="usuario_senha">Senha</label>
                    <input type="password" class="form-control" id="usuario_senha" name="usuario_senha" placeholder="Senha">
                </div>
                <div class="d-grid gap-2 mt-2">
                    <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="fixed-bottom">
    <div class="card-footer text-muted">
        <p class="text-center">© Copyright 2021 wbsartori.com.br - Todos os direitos reservados. Wesley Sartori</p>
    </div>
</div>

<?php \App\Core\View::make()->load('layout_login/footer');?>
