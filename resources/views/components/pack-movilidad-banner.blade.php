@props([
    'ctaHref' => '#soatForm',
])

@once
    <style>
        .pack-banner {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
            gap: 1.25rem 1.5rem;
            align-items: center;
            width: 100%;
        }

        .pack-banner__content {
            color: #066188;
            position: relative;
            z-index: 2;
        }

        .pack-banner__title {
            font-family: Ubuntu, 'Open Sans', sans-serif;
            font-size: clamp(1.45rem, 2.4vw, 2.15rem);
            font-weight: 700;
            line-height: 1.15;
            color: #007ab7;
            margin: 0 0 0.55rem;
        }

        .pack-banner__tagline {
            font-family: Ubuntu, 'Open Sans', sans-serif;
            font-size: clamp(0.95rem, 1.5vw, 1.2rem);
            font-weight: 700;
            line-height: 1.25;
            color: #f5a623;
            margin: 0 0 0.85rem;
        }

        .pack-banner__intro {
            font-size: clamp(0.88rem, 1.1vw, 1rem);
            line-height: 1.55;
            margin: 0 0 0.9rem;
            color: #066188;
        }

        .pack-banner__list {
            list-style: none;
            margin: 0 0 1.25rem;
            padding: 0;
            display: grid;
            gap: 0.55rem;
        }

        .pack-banner__list li {
            position: relative;
            padding-left: 1rem;
            font-size: clamp(0.78rem, 0.95vw, 0.88rem);
            line-height: 1.45;
            color: #066188;
        }

        .pack-banner__list li::before {
            content: ">";
            position: absolute;
            left: 0;
            top: 0;
            color: #007ab7;
            font-weight: 700;
        }

        .pack-banner__cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 148px;
            padding: 0.55rem 1.35rem;
            border: 2px solid #007ab7;
            border-radius: 999px;
            background: #fff;
            color: #007ab7;
            font-family: Ubuntu, 'Open Sans', sans-serif;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .pack-banner__cta:hover {
            background: #007ab7;
            color: #fff;
            transform: translateY(-1px);
        }

        .pack-banner__visual {
            margin: 0;
            position: relative;
            z-index: 1;
            border-radius: 10px;
            overflow: hidden;
            background: radial-gradient(circle at 70% 40%, rgba(0, 171, 216, 0.18) 0%, transparent 55%), #000;
            box-shadow: 0 10px 28px rgba(0, 52, 89, 0.12);
        }

        .pack-banner__visual img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center center;
        }

        .pack-banner__mobile-art {
            display: none;
            margin: 0 0 0.75rem;
            border-radius: 8px;
            overflow: hidden;
            max-height: 132px;
            background: linear-gradient(135deg, #d6eef8 0%, #eef8fd 100%);
        }

        .pack-banner__mobile-art img {
            display: block;
            width: 100%;
            height: 132px;
            object-fit: cover;
            object-position: center 35%;
        }

        @media (max-width: 1024px) {
            .pack-banner {
                grid-template-columns: 1fr;
            }

            .pack-banner__visual {
                max-width: 420px;
                margin: 0 auto;
            }
        }

        @media (max-width: 768px) {
            .pack-banner {
                gap: 0.75rem;
            }

            .pack-banner__content {
                display: flex;
                flex-direction: column;
                text-align: left;
            }

            .pack-banner__mobile-art {
                order: 3;
            }

            .pack-banner__title {
                order: 1;
                font-size: 1.15rem;
                margin-bottom: 0.35rem;
            }

            .pack-banner__tagline {
                order: 2;
                font-size: 0.82rem;
                margin-bottom: 0.55rem;
            }

            .pack-banner__intro {
                order: 4;
                font-size: 0.8rem;
                line-height: 1.45;
                margin-bottom: 0.65rem;
            }

            .pack-banner__list {
                order: 5;
                gap: 0.4rem;
                margin-bottom: 0.85rem;
            }

            .pack-banner__list li {
                font-size: 0.74rem;
                line-height: 1.35;
                padding-left: 0.85rem;
            }

            .pack-banner__cta {
                order: 6;
                min-width: 0;
                width: 100%;
                max-width: 220px;
                padding: 0.48rem 1rem;
                font-size: 0.76rem;
            }

            .pack-banner__visual {
                display: none;
            }

            .pack-banner__mobile-art {
                display: block;
            }
        }

        @media (max-width: 480px) {
            .pack-banner__mobile-art {
                max-height: 108px;
                margin-bottom: 0.6rem;
            }

            .pack-banner__mobile-art img {
                height: 108px;
            }

            .pack-banner__title {
                font-size: 1.05rem;
            }

            .pack-banner__tagline {
                font-size: 0.78rem;
            }

            .pack-banner__intro {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .pack-banner__list li:nth-child(n+3) {
                display: none;
            }

            .pack-banner__list li:nth-child(2) {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        }
    </style>
@endonce

<div {{ $attributes->merge(['class' => 'pack-banner']) }}>
    <div class="pack-banner__content">
        <figure class="pack-banner__mobile-art">
            <img
                src="{{ asset('images/banners/pack-movilidad-mundial.png') }}"
                alt="Pack de Movilidad Mundial"
                width="960"
                height="540"
                decoding="async"
            >
        </figure>

        <h1 class="pack-banner__title">¡Compra ya tu Pack de Movilidad Mundial!</h1>
        <p class="pack-banner__tagline">SOAT + Accidentes Personales + Daños Materiales a Terceros</p>
        <p class="pack-banner__intro">
            Ahora podrás conducir sin preocupaciones con la triple cobertura que hemos diseñado para protegerte en caso de accidentes de tránsito
        </p>
        <ul class="pack-banner__list">
            <li>Cubrimos rotura de vidrios laterales, películas de seguridad, reposición de farolas delanteras y stops traseros, rotura vidrio panorámico y llantas estalladas.</li>
            <li>Reparación de daños materiales a terceros, asistencia jurídica y levantamiento digital de información en el lugar del accidente.</li>
            <li>Respaldo ante lesiones personales ocasionados en un accidente de tránsito.</li>
        </ul>
        <a href="{{ $ctaHref }}" class="pack-banner__cta">CONOCE MÁS</a>
    </div>

    <figure class="pack-banner__visual">
        <img
            src="{{ asset('images/banners/pack-movilidad-hero.png') }}"
            alt="Pack de Movilidad Mundial: SOAT, Accidentes Personales y Seguro Ter-cero"
            width="640"
            height="360"
            decoding="async"
        >
    </figure>
</div>
