<?= $this->extend('doador/layout/dashboard') ?>

<?= $this->section('title') ?>Cadastrar Doador<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2>Cadastro de Doador</h2>

<form action="<?= base_url('doador/salvar') ?>" method="post">

    <input type="text" name="nome" placeholder="Nome" class="form-control mb-2">
    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
    <input type="text" name="celular" placeholder="Celular" class="form-control mb-2">
    <input type="date" name="data_nas" class="form-control mb-3">

    <h5>Endereço</h5>

    <input type="text" name="rua" placeholder="Rua" class="form-control mb-2">
    <input type="text" name="complemento" placeholder="Complemento" class="form-control mb-2">
    <input type="text" name="bairro" placeholder="Bairro" class="form-control mb-2">
    <input type="text" name="municipio" placeholder="Município" class="form-control mb-2">
    <input type="text" name="estado" placeholder="Estado" class="form-control mb-2">

    <select name="local_doacao" class="form-control mb-3">
        <option value="Nao">Não</option>
        <option value="Sim">Sim</option>
    </select>

    <button class="btn btn-success">Salvar</button>

</form>

<?= $this->endSection() ?>