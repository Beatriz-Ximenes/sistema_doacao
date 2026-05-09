<h2>Verificação</h2>

<?php if(session()->getFlashdata('erro')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('erro') ?>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('sucesso')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('sucesso') ?>
    </div>
<?php endif; ?>

<p>
Clique no botão abaixo para abrir o WhatsApp e enviar seu código.
Depois volte aqui e digite o código para confirmar.
</p>

<p>Digite o código enviado para seu número</p>

<form method="post" action="<?= base_url('doador/confirmar') ?>">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="text" name="codigo" class="form-control mb-2" placeholder="Código">
    <button class="btn btn-success">Confirmar</button>
</form>

<?php
$mensagem = "Olá, estou confirmando meu número. Meu código é: ".$codigo . " Digite esse codigo no site para validar seu cadastro";
$link = "https://wa.me/55".$celular."?text=".urlencode($mensagem);
?>

<a href="<?= $link ?>" target="_blank" class="btn btn-success mt-3">
    💬 Enviar código pelo WhatsApp
</a>

