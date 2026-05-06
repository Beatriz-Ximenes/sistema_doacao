<!DOCTYPE html>
<html>
<head>
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    <div class="bg-dark text-white p-3" style="width:250px;min-height:100vh;">
        <h4><?= session()->get('nome') ?></h4>

        <a href="<?= base_url('doador') ?>" class="text-white d-block">🏠 Home</a>
        <a href="<?= base_url('doador/cadastrar') ?>" class="text-white d-block">➕ Cadastro</a>
        <a href="<?= base_url('doador/roupas') ?>" class="text-white d-block">👕 Minhas Doações</a>
    </div>

    <div class="flex-grow-1 p-4">
        <?= $this->renderSection('content') ?>
    </div>

</div>

</body>
</html>