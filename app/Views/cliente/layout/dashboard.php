<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>
    <link href="assets/css/cliente/layout/dashboard.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    <!-- MENU -->
    <div class="sidebar p-3 text-white">
        <h4 class="text-center mb-4"><?= session()->get('nome') ?? 'Cliente' ?></h4>

        <a href="<?= base_url('cliente') ?>" class="class="<?= str_contains(uri_string(), 'cliente') ? 'active' : '' ?>"">🏠 Home</a>
        <a href="<?= base_url('cliente/cadastrar') ?>" class="<?= uri_string() == 'cliente/cadastrar' ? 'active' : '' ?>">➕ Cadastrar roupas</a>
        <a href="<?= base_url('cliente/listar') ?>">📋 Meus dados</a>
        <a href="<?= base_url('cliente/compras') ?>">💳 Compras</a>
    </div>

    <!-- CONTEÚDO -->
    <div class="flex-grow-1">

        <div class="topbar d-flex justify-content-between">
            <span>Área do Cliente</span>
            <span><?= session()->get('nome') ?? 'Usuário' ?></span>
        </div>

        <div class="p-4">
            <?= $this->renderSection('content') ?>
        </div>

    </div>

</div>

</body>
</html>