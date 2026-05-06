<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/cliente/cadastrar.css') ?>">
</head>
<body>

    <?= $this->extend('cliente/layout/dashboard') ?>

<?= $this->section('title') ?>Cadastrar<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2>Cadastrar Cliente</h2>

<form action="<?= base_url('cliente/salvar') ?>" method="post">

    <input type="text" name="nome" placeholder="Nome" class="form-control mb-2">
    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
    <input type="text" name="celular" placeholder="Celular" class="form-control mb-2">
    <input type="date" name="data_nas" class="form-control mb-2">

    <button class="btn btn-primary">Salvar</button>

</form>

<?= $this->endSection() ?>
</body>
</html>