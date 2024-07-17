<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de reservas 1.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">Reservas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Inicio</a>
                </li>
                <?php if(\App\Core\Session\Session::session()->getValue('users')['perfil'] === 'administrador')  { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu">
                        <?php if(\App\Core\Session\Session::session()->getValue('users')['perfil'] === 'administrador' ||
                        \App\Core\Session\Session::session()->getValue('users')['permissao']['criar_equipamento'] === 'S')  { ?>
                            <li><a class="dropdown-item" href="/equipaments">Equipamentos</a></li>
                        <?php } ?>
                        <?php if(\App\Core\Session\Session::session()->getValue('users')['perfil'] === 'administrador' ||
                            \App\Core\Session\Session::session()->getValue('users')['permissao']['criar_sala'] === 'S')  { ?>
                            <li><a class="dropdown-item" href="/rooms">Salas</a></li>
                        <?php } ?>
                        <?php if(\App\Core\Session\Session::session()->getValue('users')['perfil'] === 'administrador' ||
                            \App\Core\Session\Session::session()->getValue('users')['permissao']['criar_usuario'] === 'S')  { ?>
                            <li><a class="dropdown-item" href="/users">Usuários</a></li>
                        <?php } ?>
                        <?php if(\App\Core\Session\Session::session()->getValue('users')['perfil'] === 'administrador' ||
                            \App\Core\Session\Session::session()->getValue('users')['permissao']['criar_veiculo'] === 'S')  { ?>
                            <li><a class="dropdown-item" href="/vehicles">Veículos</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Reservas
                    </a>
                    <ul class="dropdown-menu">
                        <?php if(\App\Core\Session\Session::session()->getValue('users')['perfil'] === 'administrador' ||
                            \App\Core\Session\Session::session()->getValue('users')['permissao']['reservar_equipamento'] === 'S')  { ?>
                            <li><a class="dropdown-item" href="/reservations/equipament">Reservar equipamentos</a></li>
                        <?php } ?>
                        <?php if(\App\Core\Session\Session::session()->getValue('users')['perfil'] === 'administrador' ||
                            \App\Core\Session\Session::session()->getValue('users')['permissao']['reservar_sala'] === 'S')  { ?>
                            <li><a class="dropdown-item" href="/reservations/room">Reservar salas</a></li>
                        <?php } ?>
                        <?php if(\App\Core\Session\Session::session()->getValue('users')['perfil'] === 'administrador'  ||
                            \App\Core\Session\Session::session()->getValue('users')['permissao']['reservar_veiculo'] === 'S')  { ?>
                            <li><a class="dropdown-item" href="/reservations/vehicle">Reservar veículos</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <?= \App\Core\Session\Session::session()->getValue('users')['nome_completo'] ?? '' ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/login/logout">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
<div class="container-fluid">

