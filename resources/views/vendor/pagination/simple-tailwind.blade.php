@if ($paginator->hasPages())
<nav class="admin-pagination">
    <div>
        @if ($paginator->onFirstPage())
            <span class="disabled">← Anterior</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">← Anterior</a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Próxima →</a>
        @else
            <span class="disabled">Próxima →</span>
        @endif
    </div>
</nav>
@endif
