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
            justify-content: space-between;
            align-items: center;
            gap: 0.75rem;
        }

        .site-topbar__partners {
            display: flex;
            align-items: center;
            flex-shrink: 1;
            min-width: 0;
            text-decoration: none;
        }

        .site-topbar__partners-img {
            display: block;
            height: 30px;
            width: auto;
            max-width: min(420px, 52vw);
            object-fit: contain;
        }

        .site-topbar__actions {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-shrink: 0;
        }

        @media (max-width: 640px) {
            .site-topbar__partners-img {
                height: 24px;
                max-width: min(280px, 46vw);
            }
        }
    </style>
@endonce

<div {{ $attributes->merge(['class' => $barClass . ' site-topbar']) }}>
    <a href="{{ route('welcome') }}" class="site-topbar__partners">
        <img
            src="{{ asset('images/logos/logos-alianzas-soat.png') }}"
            alt="SOAT, Accidentes Personales y Seguro Ter-cero"
            class="site-topbar__partners-img"
            width="420"
            height="30"
            decoding="async"
        >
    </a>
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
