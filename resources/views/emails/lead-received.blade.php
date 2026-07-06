<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Novo Lead — ViaResolve</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; background: #f5f5f5; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; }
        .header { background: #0D1B2A; padding: 24px 32px; }
        .header h1 { color: #fff; margin: 0; font-size: 20px; }
        .header span { color: #60A5FA; }
        .body { padding: 32px; }
        .field { margin-bottom: 16px; }
        .label { font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #6B7280; }
        .value { font-size: 16px; font-weight: 600; color: #0D1B2A; margin-top: 4px; }
        .footer { background: #F9FAFB; padding: 16px 32px; font-size: 12px; color: #9CA3AF; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Novo lead — <span>ViaResolve</span></h1>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">Nome</div>
                <div class="value">{{ $lead->name }}</div>
            </div>
            <div class="field">
                <div class="label">E-mail</div>
                <div class="value">{{ $lead->email }}</div>
            </div>
            <div class="field">
                <div class="label">Telefone</div>
                <div class="value">{{ $lead->phone }}</div>
            </div>
            @if($lead->problem)
            <div class="field">
                <div class="label">Problema relatado</div>
                <div class="value">{{ $lead->problem }}</div>
            </div>
            @endif
            <div class="field">
                <div class="label">Data/hora</div>
                <div class="value">{{ $lead->created_at->format('d/m/Y H:i') }}</div>
            </div>
        </div>
        <div class="footer">
            ViaResolve &mdash; Painel de leads: /admin/leads
        </div>
    </div>
</body>
</html>
