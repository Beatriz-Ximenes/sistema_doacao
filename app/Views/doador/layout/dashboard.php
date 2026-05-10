<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/doador/layout/dashboard.css') ?>">
</head>

<body>

<div class="d-flex">

    <!-- MENU -->
    <div class="sidebar p-3 text-white">

        <h4 class="text-center mb-4">
            <?= session()->get('nome') ?? 'Doador' ?>
        </h4>

        <a href="<?= base_url('doador/perfil') ?>">Perfil</a>
        <a href="<?= base_url('doador') ?>">🏠 Dashboard</a>
        <a href="<?= base_url('doador/roupa/cadastrar') ?>">➕ Cadastrar Roupa</a>
        <a href="<?= base_url('doador/roupa') ?>">👕 Minhas Doações</a>
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