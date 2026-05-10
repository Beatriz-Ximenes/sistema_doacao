<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Veste+ — Doe roupas, transforme vidas</title>

  <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/index.css') ?>" />
  <link rel="icon" href="<?= base_url('icon/favicon.ico') ?>">

</head>

<body>

<header class="navbar">
  <div class="container nav-inner">
    <a href="#" class="logo">
      <span class="logo-mark"></span>
      <span>Veste<em>+</em></span>
    </a>

    <nav class="nav-links">
      <a href="#como">Como funciona</a>
      <a href="#campanhas">Campanhas</a>
      <a href="#impacto">Impacto</a>
      <a href="#contato">Contato</a>
    </nav>

    <div class="nav-actions">
      <button class="btn btn-ghost" onclick="abrirLogin()">Entrar</button>
      <button class="btn btn-primary" onclick="abrirCadastro()">Cadastrar-se</button>
    </div>
  </div>
</header>

<main>

<!-- HERO -->
<section class="hero">
  <div class="container hero-inner">
    <div class="hero-text">
      <span class="badge">Doação de roupas · Brasil</span>
      <h1>Aquele casaco parado <em>pode aquecer</em> alguém esta noite.</h1>
      <p>A Veste+ conecta seu guarda-roupa a quem mais precisa.</p>

      <div class="hero-cta">
        <button class="btn btn-primary btn-lg" onclick="abrirCadastro()">Cadastrar-se grátis →</button>
        <a href="#como" class="btn btn-link">Ver como funciona</a>
      </div>
    </div>

    <div class="hero-art">
      <img src="<?= base_url('img/caixa.jpg') ?>">
    </div>
  </div>
</section>

</main>

<footer id="contato">
  <div class="container footer-inner">
    <p>© 2026 Veste+</p>
  </div>
</footer>

<!-- ================= MODAL CADASTRO ================= -->
<div class="modal" id="signupModal">
  <div class="modal-backdrop" onclick="fecharModal()"></div>

  <div class="modal-card">
    <button class="modal-close" onclick="fecharModal()">×</button>

    <h3>Crie sua conta</h3>

    <form method="post" action="<?= base_url('doador/salvar') ?>" id="signupForm">

      <label>Nome
        <input type="text" name="nome" required>
      </label>

      <label>Email
        <input type="email" name="email" required>
      </label>

      <label>Celular
        <input type="text" name="celular" required>
      </label>

      <label>Senha
        <input type="password" name="senha" required>
      </label>

      <label>Tipo de conta
        <select onchange="trocarCadastro(this.value)">
          <option value="doador">Doador</option>
          <option value="cliente">Cliente</option>
        </select>
      </label>

      <button class="btn btn-primary btn-lg btn-block">
        Cadastrar
      </button>

    </form>

  </div>
</div>

<!-- ================= MODAL LOGIN ================= -->
<div class="modal" id="loginModal">
  <div class="modal-backdrop" onclick="fecharModal()"></div>

  <div class="modal-card">
    <button class="modal-close" onclick="fecharModal()">×</button>

    <h3>Entrar</h3>

    <form method="post" action="<?= base_url('doador/autenticar') ?>" id="loginForm">

      <label>Email
        <input type="email" name="email" required>
      </label>

      <label>Senha
        <input type="password" name="senha" required>
      </label>

      <label>Tipo
        <select onchange="trocarLogin(this.value)">
          <option value="doador">Doador</option>
          <option value="cliente">Cliente</option>
        </select>
      </label>

      <button class="btn btn-primary btn-lg btn-block">
        Entrar
      </button>

    </form>

  </div>
</div>

<script>
function abrirCadastro() {
  document.getElementById('signupModal').style.display = 'block';
}

function abrirLogin() {
  document.getElementById('loginModal').style.display = 'block';
}

function fecharModal() {
  document.getElementById('signupModal').style.display = 'none';
  document.getElementById('loginModal').style.display = 'none';
}

function trocarCadastro(tipo) {
  let form = document.getElementById('signupForm');

  if (tipo === 'cliente') {
    form.action = "<?= base_url('cliente/salvar') ?>";
  } else {
    form.action = "<?= base_url('doador/salvar') ?>";
  }
}

function trocarLogin(tipo) {
  let form = document.getElementById('loginForm');

  if (tipo === 'cliente') {
    form.action = "<?= base_url('cliente/autenticar') ?>";
  } else {
    form.action = "<?= base_url('doador/autenticar') ?>";
  }
}
</script>

</body>
</html>