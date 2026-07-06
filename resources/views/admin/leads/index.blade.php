<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads — ViaResolve Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/scss/admin.scss'])
</head>
<body class="admin-page">

<aside class="admin-sidebar">
    <div class="admin-sidebar__logo">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
            <circle cx="14" cy="14" r="14" fill="#2563EB"/>
            <path d="M8 14l4 4 8-8" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Via<strong>Resolve</strong></span>
    </div>
    <nav class="admin-sidebar__nav">
        <a href="{{ route('admin.leads') }}" class="admin-sidebar__link active">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M2 2h12v12H2z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><path d="M5 6h6M5 9h4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
            Leads
        </a>
        <a href="{{ route('landing') }}" target="_blank" class="admin-sidebar__link">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Ver site
        </a>
    </nav>
    <form method="POST" action="{{ route('admin.logout') }}" class="admin-sidebar__logout">
        @csrf
        <button type="submit" class="admin-sidebar__link admin-sidebar__link--logout">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6 2H3a1 1 0 00-1 1v10a1 1 0 001 1h3M10 11l3-3-3-3M13 8H6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Sair
        </button>
    </form>
</aside>

<main class="admin-main">
    <div class="admin-topbar">
        <h1>Painel de Leads</h1>
        <span class="admin-topbar__date">{{ now()->format('d/m/Y H:i') }}</span>
    </div>

    @if(session('success'))
    <div class="admin-alert admin-alert--success">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="8" fill="#10B981"/><path d="M5 8l2.5 2.5L11 6" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        {{ session('success') }}
    </div>
    @endif

    {{-- Stats --}}
    <div class="admin-stats">
        <div class="admin-stat-card">
            <span class="admin-stat-card__number">{{ $stats['total'] }}</span>
            <span class="admin-stat-card__label">Total de leads</span>
        </div>
        <div class="admin-stat-card admin-stat-card--blue">
            <span class="admin-stat-card__number">{{ $stats['new'] }}</span>
            <span class="admin-stat-card__label">Novos</span>
        </div>
        <div class="admin-stat-card admin-stat-card--yellow">
            <span class="admin-stat-card__number">{{ $stats['contacted'] }}</span>
            <span class="admin-stat-card__label">Contatados</span>
        </div>
        <div class="admin-stat-card admin-stat-card--green">
            <span class="admin-stat-card__number">{{ $stats['closed'] }}</span>
            <span class="admin-stat-card__label">Encerrados</span>
        </div>
    </div>

    {{-- Filtros --}}
    <div class="admin-filters">
        <form method="GET" action="{{ route('admin.leads') }}" class="admin-filters__form">
            <input
                type="text"
                name="search"
                class="admin-input"
                placeholder="Buscar por nome, e-mail ou telefone..."
                value="{{ request('search') }}"
            >
            <select name="status" class="admin-select">
                <option value="">Todos os status</option>
                <option value="new"       @selected(request('status') === 'new')>Novo</option>
                <option value="contacted" @selected(request('status') === 'contacted')>Contatado</option>
                <option value="closed"    @selected(request('status') === 'closed')>Encerrado</option>
            </select>
            <button type="submit" class="admin-btn admin-btn--primary">Filtrar</button>
            @if(request('search') || request('status'))
            <a href="{{ route('admin.leads') }}" class="admin-btn admin-btn--ghost">Limpar</a>
            @endif
        </form>
    </div>

    {{-- Tabela --}}
    <div class="admin-table-wrap">
        @if($leads->isEmpty())
        <div class="admin-empty">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="23" stroke="#E5E7EB" stroke-width="2"/><path d="M16 24h16M24 16v16" stroke="#9CA3AF" stroke-width="2" stroke-linecap="round"/></svg>
            <p>Nenhum lead encontrado.</p>
        </div>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Problema</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leads as $lead)
                <tr>
                    <td class="admin-table__id">{{ $lead->id }}</td>
                    <td class="admin-table__name">{{ $lead->name }}</td>
                    <td>
                        <a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                    </td>
                    <td>
                        <a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a>
                    </td>
                    <td class="admin-table__problem">
                        @if($lead->problem)
                            <span title="{{ $lead->problem }}">{{ Str::limit($lead->problem, 50) }}</span>
                        @else
                            <span class="admin-table__empty">—</span>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.leads.status', $lead) }}">
                            @csrf @method('PATCH')
                            <select name="status" class="admin-status-select admin-status-select--{{ $lead->status }}" onchange="this.form.submit()">
                                <option value="new"       @selected($lead->status === 'new')>Novo</option>
                                <option value="contacted" @selected($lead->status === 'contacted')>Contatado</option>
                                <option value="closed"    @selected($lead->status === 'closed')>Encerrado</option>
                            </select>
                        </form>
                    </td>
                    <td class="admin-table__date">
                        {{ $lead->created_at->format('d/m/Y') }}<br>
                        <small>{{ $lead->created_at->format('H:i') }}</small>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" onsubmit="return confirm('Remover este lead?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="admin-btn-icon admin-btn-icon--danger" title="Remover">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 3.5h10M5.5 3.5V2.5h3v1M6 6v4M8 6v4M3.5 3.5l.5 8h6l.5-8" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    {{-- Paginação --}}
    @if($leads->hasPages())
    <div class="admin-pagination">
        {{ $leads->links('pagination::simple-tailwind') }}
    </div>
    @endif
</main>

</body>
</html>
