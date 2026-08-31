<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pago con código QR — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    @php
        $monto = '$' . number_format($total, 0, ',', '.');
        $payloadQr = 'PAGO SOAT|' . $cliente->nombre . '|' . $monto;
        $qrImgGenerado = 'https://api.qrserver.com/v1/create-qr-code/?size=260x260&data=' . urlencode($payloadQr);
        $qrImg = $qrConfig && $qrConfig->qr_image_path ? asset($qrConfig->qr_image_path) : $qrImgGenerado;
        $mensajePago = $qrConfig && $qrConfig->mensaje_pago
            ? $qrConfig->mensaje_pago
            : 'Abre Nequi, Daviplata o tu app bancaria y busca la opción de pagar con QR. Si no puedes escanear en vivo, guarda una captura del código en tu galería y usa “Escanear desde galería” o “Escanear imagen”.';
        $nombreComercio = $qrConfig && $qrConfig->nombre_comercio ? $qrConfig->nombre_comercio : config('app.name', 'Seguro SOAT');
        $llave = $qrConfig && $qrConfig->llave ? $qrConfig->llave : null;
        $placaFmt = $vehiculo->placa ? strtoupper($vehiculo->placa) : '';
        $whatsConfirmUrl = 'https://api.whatsapp.com/send?phone=573219127738&text='
            . rawurlencode(
                'Hola, ya realicé el pago de mi SOAT por ' . $monto
                . ' a nombre de ' . strtoupper($cliente->nombre) . '.'
                . ($placaFmt ? ' Placa: ' . $placaFmt . '.' : '')
                . ' Por favor confirmen el pago. Gracias.'
            );
    @endphp
    <style>
        :root {
            --sm-blue: #0d5f84;
            --sm-bg: #e9eff5;
            --sm-card: #ffffff;
            --sm-border: #d9e2e9;
            --sm-accent: #2bd2c1;
            --sm-text: #22333f;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Open Sans', sans-serif;
            background: var(--sm-bg);
            color: var(--sm-text);
        }
        .top {
            background: #fff;
            border-top: 2px solid var(--sm-blue);
            box-shadow: 0 1px 2px rgba(0,0,0,0.08);
            padding: 0.7rem 1rem;
        }
        .top-inner {
            max-width: 980px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo-image {
            display: block;
            width: auto;
            height: 44px;
            max-width: 180px;
            object-fit: contain;
        }
        .btn-contact {
            border: 1px solid #0f7aa6;
            border-radius: 999px;
            background: transparent;
            color: #0f7aa6;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.72rem;
        }
        .wrap {
            min-height: calc(100vh - 64px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.35rem;
        }
        .card {
            width: 100%;
            max-width: 470px;
            background: var(--sm-card);
            border: 1px solid var(--sm-border);
            border-radius: 10px;
            box-shadow: 0 1px 5px rgba(0,0,0,0.08);
            padding: 1.2rem 1.1rem 1rem;
        }
        .title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--sm-blue);
            text-align: center;
            margin-bottom: 0.9rem;
        }
        .panel {
            border: 1px solid #edf2f5;
            border-radius: 8px;
            padding: 0.8rem;
            background: #fbfdff;
        }
        .qr-box {
            display: flex;
            justify-content: center;
            margin-bottom: 0.55rem;
        }
        .breb-head {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            margin-bottom: 0.7rem;
        }
        .breb-logo {
            height: 28px;
            width: auto;
            display: block;
        }
        .breb-head span {
            font-size: 0.8rem;
            font-weight: 700;
            color: #4b6574;
        }
        .qr-frame {
            display: inline-flex;
            padding: 3px;
            border-radius: 16px;
            background: linear-gradient(90deg, #00c2ff, #3dff8b);
        }
        .qr-frame img {
            display: block;
            width: 240px;
            height: 240px;
            border: 0;
            border-radius: 13px;
            background: #fff;
            padding: 8px;
        }
        .amount {
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            color: var(--sm-blue);
            font-weight: 700;
            font-size: 1.25rem;
            margin: 0.3rem 0 0.35rem;
        }
        .hint {
            text-align: center;
            font-size: 0.78rem;
            color: #4b6574;
            margin-bottom: 0.7rem;
            line-height: 1.35;
        }
        .steps {
            font-size: 0.78rem;
            color: #4b6574;
            text-align: center;
            line-height: 1.45;
            margin-bottom: 0.85rem;
        }
        .steps strong { color: var(--sm-blue); }
        .steps-list {
            font-size: 0.78rem;
            color: #4b6574;
            line-height: 1.55;
            margin: 0 auto 0.95rem;
            padding-left: 1.25rem;
            max-width: 28rem;
            text-align: left;
        }
        .steps-list li { margin-bottom: 0.55rem; }
        .steps-list strong { color: var(--sm-blue); }
        .btn-whats {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            border-radius: 999px;
            background: #25d366;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.82rem;
            font-weight: 700;
            padding: 0.72rem 0.9rem;
            margin-top: 0.35rem;
            box-shadow: 0 2px 8px rgba(37, 211, 102, 0.35);
        }
        .btn-whats:hover { filter: brightness(1.05); }
        .other {
            margin-top: 0.75rem;
            font-size: 0.72rem;
            color: #617785;
            font-weight: 700;
        }
        .method {
            border-top: 1px solid #e8eef3;
            padding: 0.62rem 0.1rem;
            display: flex;
            justify-content: space-between;
            font-size: 0.82rem;
            color: #324e60;
        }
        a.method {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
            border-radius: 6px;
        }
        a.method:hover {
            background: #f3f8fb;
        }
        .apps-pago {
            margin-top: 0.55rem;
            border-top: 1px solid #e8eef3;
            padding-top: 0.65rem;
        }
        .apps-pago img {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 8px;
            border: 1px solid #dde5ea;
            background: #fff;
        }
        .notice {
            margin-top: 0.85rem;
            background: #fff3dc;
            border: 1px solid #ffe3a8;
            color: #7a5b19;
            font-size: 0.66rem;
            padding: 0.5rem 0.6rem;
            border-radius: 6px;
            line-height: 1.45;
        }
        .brands {
            margin-top: 0.75rem;
            display: flex;
            justify-content: center;
            gap: 0.6rem;
            font-size: 0.72rem;
            color: #698091;
            font-weight: 700;
        }
        .llave-wrap {
            margin: 0.85rem 0 0.35rem;
        }
        .llave-label {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            color: #6b7c88;
            margin-bottom: 0.45rem;
        }
        .breb-logo-sm {
            height: 16px;
            width: auto;
            display: block;
        }
        .llave-row {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            border: 1.5px solid transparent;
            border-radius: 12px;
            padding: 0.55rem 0.6rem 0.55rem 0.75rem;
            background:
                linear-gradient(#fff, #fff) padding-box,
                linear-gradient(90deg, #00c2ff, #3dff8b) border-box;
        }
        .llave-icon {
            flex-shrink: 0;
            width: 24px;
            height: 24px;
            color: #00b4d8;
        }
        .llave-value {
            flex: 1;
            min-width: 0;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.92rem;
            font-weight: 700;
            color: #0099c9;
            text-decoration: underline;
            text-underline-offset: 3px;
            word-break: break-all;
            background: none;
            border: 0;
            padding: 0;
            cursor: pointer;
            text-align: left;
        }
        .llave-copy {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: 0.32rem;
            border: 0;
            border-radius: 999px;
            background: linear-gradient(90deg, #00b4d8, #22c55e);
            color: #fff;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 0.42rem 0.85rem;
            cursor: pointer;
        }
        .llave-copy:hover { filter: brightness(1.08); }
        .llave-copy.is-copied { background: #0f7a4a; }
        .llave-copy svg {
            width: 14px;
            height: 14px;
        }
    </style>
</head>
<body>
    <header class="top">
        <div class="top-inner">
            <a href="{{ route('welcome') }}">
                <x-site-header-brand variant="azul" logo-class="logo-image block max-h-[68px] w-auto object-contain" />
            </a>
            <button type="button" class="btn-contact">Contacto</button>
        </div>
    </header>
    <main class="wrap">
        <section class="card">
            <h1 class="title">Pago con Código QR</h1>
            <p class="steps" style="margin-bottom:0.45rem;"><strong>Cómo pagar con este código</strong></p>
            <ol class="steps-list">
                <li><strong>Escanea el QR</strong> con la cámara de tu celular desde tu app (Nequi, Daviplata, banco, etc.). <strong>O</strong> haz una <strong>captura de pantalla</strong> del código, guárdala en tu galería y en la app elige <strong>“Escanear desde galería”</strong> o <strong>“Escanear imagen”</strong>.@if($llave) También puedes <strong>pagar con la llave</strong> copiándola abajo.@endif</li>
                <li>Al pagar, <strong>ingresa el valor exacto</strong> que ves arriba (<strong>{{ $monto }}</strong>). Debe ser el mismo monto; revísalo antes de confirmar.</li>
                <li>Cuando la app te confirme el envío, pulsa el <strong>botón verde</strong> para <strong>confirmar el pago por WhatsApp</strong> y agilizar la verificación.</li>
            </ol>
            <div class="panel">
                <div class="breb-head">
                    <img src="{{ asset('images/logos/bre-b.png') }}" alt="Bre-B" class="breb-logo">
                    <span>Código QR</span>
                </div>
                <div class="qr-box">
                    <div class="qr-frame">
                        <img src="{{ $qrImg }}" alt="Código QR de pago">
                    </div>
                </div>
                <p class="hint" style="margin-bottom:0.35rem;font-weight:700;color:#0d5f84;">{{ $nombreComercio }}</p>
                <div class="amount">{{ $monto }}</div>
                <p class="hint">{{ $mensajePago }}</p>
                @if($llave)
                    <div class="llave-wrap">
                        <div class="llave-label">
                            <span>O PAGA CON LLAVE</span>
                            <img src="{{ asset('images/logos/bre-b.png') }}" alt="Bre-B" class="breb-logo-sm">
                        </div>
                        <div class="llave-row">
                            <svg class="llave-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="8" cy="15" r="4"/>
                                <path d="M11 12.5 20.5 3"/>
                                <path d="M16.5 6.5 19.5 9.5"/>
                                <path d="M18.2 4.8 21 7.6"/>
                            </svg>
                            <button type="button" class="llave-value" data-llave="{{ $llave }}" aria-label="Copiar llave {{ $llave }}">{{ $llave }}</button>
                            <button type="button" class="llave-copy" data-llave="{{ $llave }}">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="8" y="8" width="11" height="13" rx="2" stroke="currentColor" stroke-width="2"/>
                                    <path d="M6 16H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <span class="llave-copy-text">Copiar</span>
                            </button>
                        </div>
                    </div>
                @endif
                <a href="{{ $whatsConfirmUrl }}" class="btn-whats" target="_blank" rel="noopener noreferrer">Confirmar pago por WhatsApp</a>
                <p class="other">Otros medios de pago:</p>
                <a href="{{ route('soat.pago.tarjeta', ['total' => $total]) }}" class="method"><span>Tarjeta Crédito / Débito</span><span>›</span></a>
                <div class="method"><span>Nequi</span><span>›</span></div>
                <div class="apps-pago">
                    <img src="{{ asset('PAGOS.jpeg') }}" alt="Apps habilitadas para pagar">
                </div>
            </div>
            <div class="notice"><strong>Importante:</strong> Comprueba que el monto y tus datos sean correctos antes de pagar. Si algo no cuadra, no envíes el dinero y contáctanos por WhatsApp.</div>
            <div class="brands">
                <span>Mastercard</span><span>VISA</span><span>PayZen</span>
            </div>
        </section>
    </main>
    @if($llave)
    <script>
        (function () {
            function fallbackCopy(text) {
                var area = document.createElement('textarea');
                area.value = text;
                area.setAttribute('readonly', '');
                area.style.position = 'absolute';
                area.style.left = '-9999px';
                document.body.appendChild(area);
                area.select();
                try { document.execCommand('copy'); } catch (e) {}
                document.body.removeChild(area);
            }

            function copyLlave(text, button) {
                var done = function () {
                    if (!button || !button.classList.contains('llave-copy')) {
                        button = document.querySelector('.llave-copy');
                    }
                    if (!button) return;
                    var label = button.querySelector('.llave-copy-text');
                    button.classList.add('is-copied');
                    if (label) label.textContent = 'Copiado';
                    setTimeout(function () {
                        button.classList.remove('is-copied');
                        if (label) label.textContent = 'Copiar';
                    }, 1800);
                };

                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(done).catch(function () {
                        fallbackCopy(text);
                        done();
                    });
                } else {
                    fallbackCopy(text);
                    done();
                }
            }

            document.querySelectorAll('[data-llave]').forEach(function (el) {
                el.addEventListener('click', function () {
                    copyLlave(el.getAttribute('data-llave'), el.classList.contains('llave-copy') ? el : document.querySelector('.llave-copy'));
                });
            });
        })();
    </script>
    @endif
</body>
</html>
