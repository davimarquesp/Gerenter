<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:#0b1220;padding:16px;">
  <div style="width:100%;max-width:520px;background:#fff;border-radius:24px;padding:32px;box-shadow:0 20px 60px rgba(0,0,0,.35);">
    <h1 style="font-size:28px;margin:0 0 6px 0;font-weight:800;color:#0f172a;text-align:center;">Entrar</h1>
    <p style="margin:0 0 24px 0;color:#64748b;text-align:center;">Use Email e CPF</p>

    @if (session('status'))
  <div style="margin-bottom:14px;color:#166534;background:#dcfce7;border:1px solid #86efac;padding:10px 12px;border-radius:14px;font-weight:700;">
    {{ session('status') }}
  </div>
@endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div style="max-width:360px;margin:0 auto 14px auto;">
        <label style="display:block;font-size:14px;color:#334155;margin-bottom:6px;font-weight:600;">Email</label>
        <input name="email" type="email" value="{{ old('email') }}" required
               style="width:100%;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;outline:none;">
        @error('email') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
      </div>

      <div style="max-width:360px;margin:0 auto 18px auto;">
        <label style="display:block;font-size:14px;color:#334155;margin-bottom:6px;font-weight:600;">CPF</label>
        <input name="cpf" type="text" value="{{ old('cpf') }}" required
               placeholder="000.000.000-00"
               style="width:100%;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;outline:none;">
        @error('cpf') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
      </div>

      <!-- BOTÃO DE LOGIN (SUBMIT) -->
      <div style="max-width:360px;margin:0 auto;">
        <button type="submit"
                style="width:100%;background:#1d4ed8;color:#fff;border:none;padding:12px 16px;border-radius:14px;font-weight:800;font-size:15px;cursor:pointer;">
          FAZER LOGIN
        </button>
      </div>
    </form>

    <div style="text-align:center;margin-top:16px;color:#64748b;font-size:14px;">
      Não tem conta?
      <a href="{{ route('register') }}" style="color:#1d4ed8;font-weight:800;text-decoration:none;">Criar agora</a>
    </div>
  </div>
</body>
</html>