<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/cliente/index.css') ?>">
    <title>Sistema de Doação</title>
</head>
<body>

    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/objetivos">Objetivos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/desenvolvedores">Desenvolvedores</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Entre/Cadastre-se</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= site_url('cliente/cadastrar') ?>">Cadastro de Cliente</a></li>
                    <li><a class="dropdown-item" href="<?= site_url('doador/cadastrar') ?>">Cadastro de Doador</a></li>
                </ul>
        </li>
        
    </ul>
    


    <h1>Bem-vindo ao Sistema de Doação</h1>
    <p>Este é o sistema de doação para ajudar pessoas necessitadas. Você
        pode se cadastrar como doador ou beneficiário para participar dessa causa nobre.</p>
    <p>Para se cadastrar, clique no link abaixo:</p>
    <ul>
        <li><a href="<?= site_url('cliente') ?>">Cadastro de Cliente</a></li>
    </ul>

    <footer>Este projeto é do Tema Integrador da Universidade UNIG </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>