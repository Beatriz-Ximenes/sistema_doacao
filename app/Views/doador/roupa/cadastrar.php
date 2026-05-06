<?= $this->extend('doador/layout/dashboard') ?>

<?= $this->section('title') ?>Doar Roupa<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2>Doar Roupa</h2>

<form action="<?= base_url('doador/roupas/salvar') ?>" method="post">

    <label>Tipo</label>
    <select name="tipo" class="form-control mb-2">
        <option>Calça</option>
        <option>Blusa</option>
        <option>Short</option>
        <option>Top</option>
        <option>Casaco</option>
        <option>Roupa Intima</option>
        <option>Vestido</option>
    </select>

    <input type="text" name="cor" placeholder="Cor" class="form-control mb-2">
    <input type="number" name="quantidade" placeholder="Quantidade" class="form-control mb-2">
    <input type="text" name="bairro" placeholder="Bairro" class="form-control mb-2">
    <input type="text" name="ponto_doacao" placeholder="Ponto de Doação" class="form-control mb-3">

    <button class="btn btn-success">Doar</button>

</form>

<?= $this->endSection() ?>