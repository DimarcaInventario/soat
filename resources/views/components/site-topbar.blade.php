@props([
    'barClass' => 'site-topbar',
    'actionsClass' => 'site-topbar__actions',
    'buttonClass' => 'site-topbar__btn',
    'withIcons' => true,
])

@once
    <style>
        .site-topbar,
        .header-top-bar.site-topbar,
        .sm-topbar.site-topbar,
        .topbar.site-topbar {
            background: #002d42;
            justify-content: flex-end;
            align-items: center;
            gap: 0.75rem;
        }

        .site-topbar__actions {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-shrink: 0;
        }
    </style>
@endonce

<div {{ $attributes->merge(['class' => $barClass . ' site-topbar']) }}>
    <div class="{{ $actionsClass }} site-topbar__actions">
        <button type="button" class="{{ $buttonClass }}" aria-label="Ayuda">
            @if ($withIcons)
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
            @endif
            <span>Ayuda</span>
        </button>
        <button type="button" class="{{ $buttonClass }}" aria-label="Contacto">
            @if ($withIcons)
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            @endif
            <span>Contacto</span>
        </button>
    </div>
</div>
