<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sunflower School | Quienes somos</title>

    <link rel="shortcut icon" href="{{ asset('favicon_io/favicon.ico') }}">
    <link rel="shortcut icon" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="shortcut icon" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('favicon_io/android-chrome-192x192.png') }}" sizes="192x192">
    <link rel="icon" href="{{ asset('favicon_io/android-chrome-512x512.png') }}" sizes="512x512">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    <header class="header">
        <img src="{{ asset('imgs/logo.png') }}" alt="Logo Sunflower School">
        <nav class="navbar">
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ route('aboutUs') }}">Quienes somos</a>
            <a href="{{ route('generalParentCenter') }}">Centro general de padres</a>
            <a href="{{ route('gallery') }}">Galería</a>
            <a href="{{ route('specialist') }}">Especialistas</a>
            <a href="{{ route('registrationApplication') }}">Solicitud de matrícula</a>
            <a href="{{ route('login') }}" class="btn">Iniciar sesión</a>
        </nav>
    </header>

    <div class="testimonials-container">
        <h1 class="mb-4">Acerca de nosotros</h1>
        <p>
            <about us here>
        </p>

        <h2 class="mt-5">Testimonios</h2>
        <div class="testimonials mt-3 ">
            <div class="testimonial-item">
                <h4>Nombre genérico 1</h4>
                <p>Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo
                    necessitatibus unde. Sed exercitationem placeatconsectetur nulla deserunt vel, justo corrupti dicta.
                </p>
            </div>
        </div>
    </div>


</body>

</html>
