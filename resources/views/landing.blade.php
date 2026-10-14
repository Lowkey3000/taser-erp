<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Taser ERP | Gestiona tu empresa en un solo lugar</title>
    <meta name="description" content="ERP en la nube por suscripción: ventas, inventario, facturación y más.">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>

<header class="nav">
    <div class="container nav__inner">
        <a href="#inicio" class="logo">Taser<span>ERP</span></a>
        <nav>
            <a href="#funciones">Funciones</a>
            <a href="#precios">Precios</a>
            <a href="#contacto" class="btn btn--small">Solicitar demo</a>
        </nav>
    </div>
</header>

<section id="inicio" class="hero">
    <div class="container">
        <h1>Toda tu empresa, <br>en un solo sistema.</h1>
        <p>Ventas, inventario, facturación y reportes en la nube. Sin instalaciones, paga mes a mes o ahorra con el plan anual.</p>
        <a href="#precios" class="btn">Ver planes</a>
        <a href="#contacto" class="btn btn--outline">Hablar con ventas</a>
    </div>
</section>

<section id="funciones" class="section">
    <div class="container">
        <h2>Todo lo que necesitas</h2>
        <div class="grid grid--3">
            <article class="card"><h3>📦 Inventario</h3><p>Control de stock en tiempo real.</p></article>
            <article class="card"><h3>🧾 Facturación</h3><p>Emite y gestiona tus documentos.</p></article>
            <article class="card"><h3>📊 Reportes</h3><p>Decide con datos claros.</p></article>
        </div>
    </div>
</section>

<section id="precios" class="section section--alt">
    <div class="container">
        <h2>Planes y precios</h2>
        <div class="toggle">
            <span class="toggle__label is-active" data-period="monthly">Mensual</span>
            <label class="switch">
                <input type="checkbox" id="billingToggle">
                <span class="slider"></span>
            </label>
            <span class="toggle__label" data-period="yearly">Anual <em>(2 meses gratis)</em></span>
        </div>

        <div class="grid grid--3">
            @foreach($plans as $plan)
            <article class="card plan {{ $plan->is_featured ? 'plan--featured' : '' }}">
                @if($plan->is_featured)<span class="badge">Más popular</span>@endif
                <h3>{{ $plan->name }}</h3>
                <p class="muted">{{ $plan->description }}</p>
                <p class="price"
                   data-monthly="{{ $plan->price_monthly }}"
                   data-yearly="{{ $plan->price_yearly }}">
                    $<span class="price__amount">{{ number_format($plan->price_monthly, 0, ',', '.') }}</span>
                    <small class="price__period">/mes</small>
                </p>
                <ul>
                    @foreach($plan->features as $f)<li>✓ {{ $f }}</li>@endforeach
                </ul>
                <a href="#contacto" class="btn js-select-plan" data-plan="{{ $plan->name }}">Elegir {{ $plan->name }}</a>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section id="contacto" class="section">
    <div class="container container--narrow">
        <h2>Solicita una demo</h2>
        <form id="leadForm" novalidate>
            <input type="text" name="name" placeholder="Nombre *" required>
            <input type="email" name="email" placeholder="Correo *" required>
            <input type="text" name="company" placeholder="Empresa">
            <textarea name="message" rows="4" placeholder="¿Qué necesitas?"></textarea>
            <button type="submit" class="btn" id="leadSubmit">Enviar</button>
        </form>
    </div>
</section>

<footer class="footer">
    <div class="container">© {{ date('Y') }} Taser ERP. Todos los derechos reservados.</div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>