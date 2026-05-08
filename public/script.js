(() => {
  const modal = document.getElementById('signupModal');
  const openers = ['signupBtn', 'heroSignup', 'ctaSignup'];
  const form = document.getElementById('signupForm');
  const msg = document.getElementById('formMsg');

  const open = () => { modal.classList.add('open'); modal.setAttribute('aria-hidden','false'); };
  const close = () => { modal.classList.remove('open'); modal.setAttribute('aria-hidden','true'); msg.textContent=''; msg.className='form-msg'; };

  openers.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('click', open);
  });

  modal.querySelectorAll('[data-close]').forEach(el => el.addEventListener('click', close));
  document.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });

  // Login: simple alert (placeholder)
  document.getElementById('loginBtn').addEventListener('click', () => {
    alert('Tela de login em breve. Por ora, cadastre-se :)');
  });

  // Form submit (apenas frontend — salva no localStorage)
  form.addEventListener('submit', e => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form).entries());
    if (!data.nome || !data.email || !data.senha) {
      msg.textContent = 'Preencha todos os campos.'; msg.className = 'form-msg error'; return;
    }
    if (data.senha.length < 6) {
      msg.textContent = 'A senha deve ter ao menos 6 caracteres.'; msg.className = 'form-msg error'; return;
    }
    try {
      const users = JSON.parse(localStorage.getItem('doarmais_users') || '[]');
      if (users.some(u => u.email === data.email)) {
        msg.textContent = 'Este e-mail já está cadastrado.'; msg.className = 'form-msg error'; return;
      }
      users.push({ nome: data.nome, email: data.email, criadoEm: new Date().toISOString() });
      localStorage.setItem('doarmais_users', JSON.stringify(users));
      msg.textContent = '✅ Cadastro realizado! Bem-vindo(a), ' + data.nome.split(' ')[0] + '.';
      msg.className = 'form-msg success';
      form.reset();
      setTimeout(close, 1600);
    } catch {
      msg.textContent = 'Erro ao salvar. Tente novamente.'; msg.className = 'form-msg error';
    }
  });

  // Smooth scroll para âncoras
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const id = a.getAttribute('href').slice(1);
      const target = document.getElementById(id);
      if (target) { e.preventDefault(); target.scrollIntoView({ behavior:'smooth', block:'start' }); }
    });
  });
})();