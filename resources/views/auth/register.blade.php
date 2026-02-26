<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:#0b1220;padding:16px;">
  <div style="width:100%;max-width:520px;background:#fff;border-radius:24px;padding:32px;box-shadow:0 20px 60px rgba(0,0,0,.35);">
    <h1 style="font-size:28px;margin:0 0 6px 0;font-weight:800;color:#0f172a;text-align:center;">Criar conta</h1>
    <p style="margin:0 0 24px 0;color:#64748b;text-align:center;">Preencha os dados</p>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div style="max-width:360px;margin:0 auto 14px auto;">
        <label style="display:block;font-size:14px;color:#334155;margin-bottom:6px;font-weight:600;">Nome</label>
        <input name="name" type="text" value="{{ old('name') }}" required
               style="width:100%;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;outline:none;">
        @error('name') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
      </div>

      <div style="max-width:360px;margin:0 auto 14px auto;">
        <label style="display:block;font-size:14px;color:#334155;margin-bottom:6px;font-weight:600;">Email</label>
        <input name="email" type="email" value="{{ old('email') }}" required
               style="width:100%;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;outline:none;">
        @error('email') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
      </div>

      <div style="max-width:360px;margin:0 auto 18px auto;">
        <label style="display:block;font-size:14px;color:#334155;margin-bottom:6px;font-weight:600;">CPF</label>
        <input name="cpf" type="text" value="{{ old('cpf') }}" required placeholder="000.000.000-00"
               style="width:100%;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;outline:none;">
        @error('cpf') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
      </div>

      <!-- BOTÃO DE CADASTRO (SUBMIT) -->
      <div style="max-width:360px;margin:0 auto;">
        <button type="submit"
                style="width:100%;background:#16a34a;color:#fff;border:none;padding:12px 16px;border-radius:14px;font-weight:800;font-size:15px;cursor:pointer;">
          CADASTRAR
        </button>
      </div>
    </form>

    <div style="text-align:center;margin-top:16px;color:#64748b;font-size:14px;">
      Já tem conta?
      <a href="{{ route('login') }}" style="color:#1d4ed8;font-weight:800;text-decoration:none;">Entrar</a>
    </div>
  </div>
</body>
</html>