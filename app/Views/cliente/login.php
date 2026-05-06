<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center" style="height:100vh;">

<form action="<?= base_url('cliente/autenticar') ?>" method="post">

    <h3>Login</h3>

    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
    <input type="password" name="senha" placeholder="Senha" class="form-control mb-2">

    <button class="btn btn-primary">Entrar</button>

</form>

</body>
</html>