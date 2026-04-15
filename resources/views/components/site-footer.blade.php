@props(['class' => ''])

<footer class="sm-site-footer {{ $class }}" role="contentinfo">
    <style>
        .sm-site-footer {
            --sm-footer-bg: #103144;
            --sm-footer-muted: rgba(255, 255, 255, 0.72);
            --sm-footer-line: rgba(255, 255, 255, 0.12);
            background: var(--sm-footer-bg);
            color: #fff;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            padding: 3.25rem 1.5rem 0;
            margin-top: 0;
        }

        .sm-site-footer a {
            color: inherit;
            text-decoration: none;
            transition: opacity 0.2s ease, color 0.2s ease;
        }

        .sm-site-footer a:hover {
            opacity: 0.85;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .sm-site-footer__inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.15fr 1fr 1.4fr;
            gap: 2.5rem 2rem;
            padding-bottom: 2.5rem;
            border-bottom: 1px solid var(--sm-footer-line);
        }

        .sm-site-footer__brand {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .sm-site-footer__logo-link {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            text-decoration: none !important;
        }

        .sm-site-footer__logo-link:hover {
            opacity: 0.92;
        }

        .sm-site-footer__logo-mark {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .sm-site-footer__logo-mark svg {
            width: 22px;
            height: 22px;
            fill: #fff;
        }

        .sm-site-footer__logo-word {
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #fff;
        }

        .sm-site-footer__logo-word small {
            display: block;
            font-weight: 500;
            font-size: 0.72rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0.85;
            margin-top: 0.15rem;
        }

        .sm-site-footer__logo-img {
            display: block;
            max-height: 56px;
            width: auto;
            max-width: min(240px, 72vw);
            height: auto;
            object-fit: contain;
        }

        .sm-site-footer__nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
        }

        .sm-site-footer__nav a {
            font-size: 0.9375rem;
            color: var(--sm-footer-muted);
        }

        .sm-site-footer__nav a:hover {
            color: #fff;
        }

        .sm-site-footer__heading {
            font-size: 0.8125rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin: 0 0 1.1rem;
            color: #fff;
        }

        .sm-site-footer__payments {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .sm-site-footer__payment-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.75rem 1rem;
        }

        .sm-site-footer__payment-row img {
            height: 28px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            filter: brightness(1.05);
        }

        .sm-site-footer__payment-row--wide img.sm-kushki {
            height: 32px;
        }

        .sm-site-footer__contact-intro {
            font-size: 0.8125rem;
            color: var(--sm-footer-muted);
            line-height: 1.5;
            margin: 0.5rem 0 0.65rem;
        }

        .sm-site-footer__contact-list {
            margin: 0;
            padding-left: 1.1rem;
            font-size: 0.8125rem;
            color: var(--sm-footer-muted);
            line-height: 1.65;
        }

        .sm-site-footer__contact-list a {
            color: #fff;
            font-weight: 500;
        }

        .sm-site-footer__social {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
            margin-top: 0.25rem;
        }

        .sm-site-footer__social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #fff;
            color: var(--sm-footer-bg);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .sm-site-footer__social a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            opacity: 1;
        }

        .sm-site-footer__social svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .sm-site-footer__bar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.25rem 1.5rem 1.75rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .sm-site-footer__copy {
            font-size: 0.75rem;
            color: var(--sm-footer-muted);
            margin: 0;
        }

        .sm-site-footer__vigilado {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-align: right;
            line-height: 1.35;
            color: var(--sm-footer-muted);
            max-width: 220px;
        }

        .sm-site-footer__vigilado-badge {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border-radius: 4px;
            border: 1px solid var(--sm-footer-line);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.5rem;
            font-weight: 800;
            text-align: center;
            line-height: 1.2;
            color: #fff;
            background: rgba(255, 255, 255, 0.06);
        }

        @media (max-width: 1024px) {
            .sm-site-footer__inner {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .sm-site-footer {
                padding-top: 2.5rem;
            }

            .sm-site-footer__inner {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .sm-site-footer__bar {
                flex-direction: column;
                align-items: center;
            }

            .sm-site-footer__vigilado {
                text-align: left;
                max-width: none;
            }
        }
    </style>

    <div class="sm-site-footer__inner">
        <div class="sm-site-footer__brand">
            <a href="{{ url('/') }}" class="sm-site-footer__logo-link">
                <x-site-logo variant="blanco" class="sm-site-footer__logo-img" />
            </a>
            <ul class="sm-site-footer__nav">
                <li><a href="{{ url('/') }}">Cotizar SOAT</a></li>
                <li><a href="{{ route('terminos.condiciones') }}">Términos y condiciones</a></li>
                <li><a href="{{ route('politica.privacidad') }}">Política de privacidad</a></li>
            </ul>
        </div>

        <div>
            <h2 class="sm-site-footer__heading">Información SOAT</h2>
            <ul class="sm-site-footer__nav">
                <li><a href="https://www.mintransporte.gov.co/" target="_blank" rel="noopener noreferrer">Ministerio de Transporte</a></li>
                <li><a href="https://www.runt.com.co/" target="_blank" rel="noopener noreferrer">RUNT — Registro único</a></li>
                <li><a href="https://www.mintransporte.gov.co/tramites-y-servicios/vigencia-soat" target="_blank" rel="noopener noreferrer">Vigencia y SOAT (referencia)</a></li>
            </ul>
        </div>

        <div>
            <h2 class="sm-site-footer__heading">Medios de pago</h2>
            <div class="sm-site-footer__payments">
                <div class="sm-site-footer__payment-row">
                    <img src="{{ asset('images/footer/payment-mastercard.webp') }}" alt="Mastercard" width="95" height="74" loading="lazy">
                    <img src="{{ asset('images/footer/payment-visa.webp') }}" alt="Visa" width="133" height="43" loading="lazy">
                </div>
                <div class="sm-site-footer__payment-row sm-site-footer__payment-row--wide">
                    <img src="{{ asset('images/footer/payment-pse.webp') }}" alt="PSE" width="104" height="81" loading="lazy">
                    <img class="sm-kushki" src="{{ asset('images/footer/payment-kushki.webp') }}" alt="Powered by Kushki" width="216" height="91" loading="lazy">
                </div>
            </div>
            <p class="sm-site-footer__contact-intro">Para soporte sobre tu compra, conserva el comprobante y los datos de contacto indicados al finalizar el pago.</p>
        </div>
    </div>

    <div class="sm-site-footer__bar">
        <p class="sm-site-footer__copy">© {{ date('Y') }} {{ config('app.name', 'Seguro SOAT') }}. Todos los derechos reservados.</p>
    </div>
</footer>
