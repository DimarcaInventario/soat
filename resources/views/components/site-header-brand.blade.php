@props([
    'variant' => 'azul',
    'logoClass' => '',
    'partnersSrc' => null,
])

@php
    $partnersImage = $partnersSrc ?: asset('images/logos/logos-productos.png');
@endphp

@once
    <style>
        .site-header-brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            min-width: 0;
        }

        .site-header-brand__main {
            display: flex;
            align-items: center;
            flex-shrink: 0;
            text-decoration: none;
        }

        .site-header-brand__divider {
            width: 1px;
            align-self: stretch;
            min-height: 42px;
            max-height: 56px;
            margin: 0.15rem 0;
            background: linear-gradient(180deg, transparent, #c5d9e4 18%, #c5d9e4 82%, transparent);
            flex-shrink: 0;
        }

        .site-header-brand__partners-wrap {
            display: flex;
            align-items: center;
            flex-shrink: 1;
            min-width: 0;
        }

        .site-header-brand__partners {
            display: block;
            height: 46px;
            width: auto;
            max-width: min(360px, 36vw);
            object-fit: contain;
            mix-blend-mode: screen;
        }

        @media (max-width: 768px) {
            .site-header-brand {
                gap: 0.55rem;
            }

            .site-header-brand__partners-wrap {
                padding: 0;
            }

            .site-header-brand__partners {
                height: 34px;
                max-width: min(220px, 42vw);
            }

            .site-header-brand__divider {
                min-height: 32px;
                max-height: 40px;
            }
        }

        @media (max-width: 480px) {
            .site-header-brand__partners {
                height: 28px;
                max-width: min(170px, 38vw);
            }
        }
    </style>
@endonce

<div {{ $attributes->merge(['class' => 'site-header-brand']) }}>
    <a href="{{ route('welcome') }}" class="site-header-brand__main">
        <x-site-logo :variant="$variant" :class="$logoClass" />
    </a>
    <span class="site-header-brand__divider" aria-hidden="true"></span>
    <span class="site-header-brand__partners-wrap">
        <img
            src="{{ $partnersImage }}?v=2"
            alt="SOAT, Accidentes Personales y Seguro Ter-cero"
            class="site-header-brand__partners"
            width="340"
            height="46"
            decoding="async"
        >
    </span>
</div>
