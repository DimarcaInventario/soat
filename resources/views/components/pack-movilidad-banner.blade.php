@once
    <style>
        .pack-banner {
            position: relative;
            width: 100%;
            min-height: 520px;
        }

        .pack-banner__copy {
            position: relative;
            z-index: 2;
            max-width: 42%;
            padding: 1rem 0 3.5rem;
            color: #003087;
        }

        .pack-banner__title {
            font-family: Ubuntu, 'Open Sans', sans-serif;
            font-size: clamp(1.65rem, 2.55vw, 2.45rem);
            font-weight: 700;
            line-height: 1.08;
            color: #003087;
            margin: 0 0 0.7rem;
        }

        .pack-banner__tagline {
            font-family: Ubuntu, 'Open Sans', sans-serif;
            font-size: clamp(0.98rem, 1.35vw, 1.18rem);
            font-weight: 700;
            line-height: 1.28;
            color: #e8a020;
            margin: 0 0 1rem;
        }

        .pack-banner__intro {
            font-size: clamp(0.86rem, 1vw, 0.95rem);
            line-height: 1.55;
            margin: 0 0 1rem;
            color: #003087;
        }

        .pack-banner__list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 0.5rem;
        }

        .pack-banner__list li {
            position: relative;
            padding-left: 1rem;
            font-size: clamp(0.76rem, 0.88vw, 0.84rem);
            line-height: 1.42;
            color: #003087;
        }

        .pack-banner__list li::before {
            content: ">";
            position: absolute;
            left: 0;
            top: 0;
            color: #007ab7;
            font-weight: 700;
        }

        .pack-banner__hero {
            position: absolute;
            right: -28%;
            bottom: 0;
            width: min(92%, 760px);
            margin: 0;
            z-index: 1;
            pointer-events: none;
        }

        .pack-banner__hero img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: contain;
            object-position: bottom right;
        }

        @media (max-width: 1280px) {
            .pack-banner__copy {
                max-width: 46%;
            }

            .pack-banner__hero {
                right: -22%;
                width: min(88%, 640px);
            }
        }

        @media (max-width: 1024px) {
            .pack-banner {
                min-height: 0;
            }

            .pack-banner__copy {
                max-width: 100%;
                padding-bottom: 0;
            }

            .pack-banner__hero {
                position: static;
                width: min(100%, 500px);
                margin: 0.75rem auto 0;
                pointer-events: auto;
            }
        }

        @media (max-width: 768px) {
            .pack-banner__copy {
                padding: 0;
            }

            .pack-banner__title {
                font-size: 1.12rem;
                margin-bottom: 0.35rem;
            }

            .pack-banner__tagline {
                font-size: 0.8rem;
                margin-bottom: 0.55rem;
            }

            .pack-banner__intro {
                font-size: 0.78rem;
                margin-bottom: 0.65rem;
            }

            .pack-banner__list li {
                font-size: 0.73rem;
                line-height: 1.35;
            }

            .pack-banner__hero {
                width: min(100%, 340px);
            }

            .pack-banner__hero img {
                max-height: 160px;
                object-fit: contain;
                object-position: center bottom;
            }
        }

        @media (max-width: 480px) {
            .pack-banner__intro {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .pack-banner__list li:nth-child(n+3) {
                display: none;
            }

            .pack-banner__hero img {
                max-height: 125px;
            }
        }
    </style>
@endonce

<div {{ $attributes->merge(['class' => 'pack-banner']) }}>
    <div class="pack-banner__copy">
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
    </div>

    <figure class="pack-banner__hero">
        <img
            src="{{ asset('images/banners/pack-movilidad-sinfondo.png') }}"
            alt="Pack de Movilidad Mundial: SOAT, Accidentes Personales y Seguro Ter-cero"
            width="760"
            height="520"
            decoding="async"
        >
    </figure>
</div>
