<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            Sistema Doação
        </a>

        <div class="ms-auto">
            <a href="<?= base_url('/') ?>" class="btn btn-outline-light btn-sm">
                🏠 Início
            </a>
        </div>

    </div>
</nav>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container-verificacao {
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 14px;
            color: #555;
        }

        input.form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
        }

        input.form-control:focus {
            border-color: #28a745;
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
        }

        .btn-success {
            background: #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background: #218838;
        }

        .alert {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        a.btn-whatsapp {
            display: block;
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            background: #25D366;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        a.btn-whatsapp:hover {
            background: #1ebe5d;
        }
    </style>
</head>



<div class="container-verificacao">

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

    <p><strong>Digite o código enviado para seu número</strong></p>

    <form method="post" action="<?= base_url('cliente/confirmarCodigo/'.$id) ?>">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="codigo" class="form-control" placeholder="Código">

        <button class="btn btn-success">Confirmar</button>
    </form>

    <?php
    $mensagem = "Olá, estou confirmando meu número. Meu código é: ".$codigo;
    $link = "https://wa.me/55".$celular."?text=".urlencode($mensagem);
    ?>

    <a href="<?= $link ?>" target="_blank" class="btn-whatsapp">
        💬 Enviar código pelo WhatsApp
    </a>

</div>
