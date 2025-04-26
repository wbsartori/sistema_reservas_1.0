<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página não encontrada | Sistema de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .error-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .error-icon {
            font-size: 6rem;
            color: #dc3545;
        }

        .error-code {
            font-size: 5rem;
            font-weight: bold;
        }

        .error-text {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .btn-home {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
<div class="container error-container">
    <div class="error-icon mb-3">
        <i class="bi bi-exclamation-triangle-fill"></i>
    </div>
    <div class="error-code">404</div>
    <div class="error-text text-muted">
        Opa! A página que você tentou acessar não foi encontrada.
    </div>
    <a href="/home" class="btn btn-primary btn-home">
        <i class="bi bi-house-door-fill me-1"></i> Voltar para a página inicial
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
