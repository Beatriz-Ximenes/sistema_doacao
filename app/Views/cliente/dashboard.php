<?= $this->extend('cliente/layout/dashboard') ?>

<?= $this->section('title') ?>Dashboard Cliente<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2>Bem-vindo!</h2>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Meus Dados</h5>
            <p>Atualize suas informações</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Compras</h5>
            <p>Veja seu histórico</p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>