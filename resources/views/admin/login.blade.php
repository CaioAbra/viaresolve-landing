<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — ViaResolve</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/scss/admin.scss'])
</head>
<body class="admin-login-page">
    <div class="admin-login">
        <div class="admin-login__card">
            <div class="admin-login__logo">
                <svg width="32" height="32" viewBox="0 0 28 28" fill="none">
                    <circle cx="14" cy="14" r="14" fill="#2563EB"/>
                    <path d="M8 14l4 4 8-8" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Via<strong>Resolve</strong></span>
            </div>
            <h1>Painel Admin</h1>
            <p>Digite a senha para acessar o painel de leads.</p>

            @if($errors->any())
            <div class="admin-alert admin-alert--error">
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                <div class="admin-form-group">
                    <label>Senha de acesso</label>
                    <input type="password" name="password" placeholder="••••••••" autofocus required>
                </div>
                <button type="submit" class="admin-btn admin-btn--primary admin-btn--full">
                    Entrar no painel
                </button>
            </form>

            <a href="{{ route('landing') }}" class="admin-login__back">← Voltar ao site</a>
        </div>
    </div>
</body>
</html>
