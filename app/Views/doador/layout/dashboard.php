<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #1e1e2f;
        }

        .sidebar a {
            color: #ccc;
            display: block;
            padding: 12px;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover,
        .active {
            background: #0d6efd;
            color: #fff;
        }

        .topbar {
            background: #fff;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- MENU -->
    <div class="sidebar p-3 text-white">

        <h4 class="text-center mb-4">
            <?= session()->get('nome') ?? 'Doador' ?>
        </h4>

        <a href="<?= base_url('doador') ?>">🏠 Dashboard</a>
        <a href="<?= base_url('doador/roupa/cadastrar') ?>">➕ Cadastrar Roupa</a>
        <a href="<?= base_url('doador/roupa') ?>">👕 Minhas Doações</a>
        <a href="<?= base_url('doador/interessados') ?>">❤️ Interessados</a>
        <a href="<?= base_url('doador/logout') ?>" class="text-danger">🚪 Sair</a>

    </div>

    <!-- CONTEÚDO -->
    <div class="flex-grow-1">

        <div class="topbar d-flex justify-content-between">
            <span>Painel do Doador</span>
            <span><?= session()->get('nome') ?></span>
        </div>

        <div class="p-4">
            <?= $this->renderSection('content') ?>
        </div>

    </div>

</div>

</body>
</html>