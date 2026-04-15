@props([
    'variant' => 'azul',
])

@php
    $isBlanco = $variant === 'blanco' || $variant === 'white';
    $src = $isBlanco
        ? asset('images/logos/logo-seguro-soat-blanco.png')
        : asset('images/logos/logo-seguro-soat-azul.png');
    $alt = config('app.name', 'Seguro SOAT');
@endphp

<img
    src="{{ $src }}"
    alt="{{ $alt }}"
    {{ $attributes->merge(['class' => 'site-logo-img']) }}
    decoding="async"
>
