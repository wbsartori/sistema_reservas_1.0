<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Reservas 1.0</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu {
            border-radius: 0.5rem;
        }

        .container-fluid {
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <i class="bi bi-calendar-check"></i> Reservas
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/home' ? 'active' : '' ?>" href="/home">
                        <i class="bi bi-house-door-fill"></i> Início
                    </a>
                </li>

                <?php $perfil = \App\Core\Session\Session::getSession('users')['users']['perfil'] ?? ''; ?>
                <?php $perm = \App\Core\Session\Session::getSession('users')['users']['permissao'] ?? ''; ?>

                <?php if ($perfil === 'administrador') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-gear-fill"></i> Cadastros
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($perfil === 'administrador' || $perm['criar_equipamento'] === 'S') : ?>
                                <li><a class="dropdown-item" href="/equipaments">Equipamentos</a></li>
                            <?php endif; ?>
                            <?php if ($perfil === 'administrador' || $perm['criar_sala'] === 'S') : ?>
                                <li><a class="dropdown-item" href="/rooms">Salas</a></li>
                            <?php endif; ?>
                            <?php if ($perfil === 'administrador' || $perm['criar_usuario'] === 'S') : ?>
                                <li><a class="dropdown-item" href="/users">Usuários</a></li>
                            <?php endif; ?>
                            <?php if ($perfil === 'administrador' || $perm['criar_veiculo'] === 'S') : ?>
                                <li><a class="dropdown-item" href="/vehicles">Veículos</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-calendar-range"></i> Reservas
                    </a>
                    <ul class="dropdown-menu">
                        <?php if ($perfil === 'administrador' || $perm['reservar_equipamento'] === 'S') : ?>
                            <li><a class="dropdown-item" href="/reservations/equipament">Equipamentos</a></li>
                        <?php endif; ?>
                        <?php if ($perfil === 'administrador' || $perm['reservar_sala'] === 'S') : ?>
                            <li><a class="dropdown-item" href="/reservations/room">Salas</a></li>
                        <?php endif; ?>
                        <?php if ($perfil === 'administrador' || $perm['reservar_veiculo'] === 'S') : ?>
                            <li><a class="dropdown-item" href="/reservations/vehicle">Veículos</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <?= \App\Core\Session\Session::getSession('users')['users']['nome_completo'] ?? '' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/login/logout">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
