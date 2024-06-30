<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sunflower School | Inicio </title>

    <link rel="shortcut icon" href="{{ asset('favicon_io/favicon.ico') }}">
    <link rel="shortcut icon" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="shortcut icon" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('favicon_io/android-chrome-192x192.png') }}" sizes="192x192">
    <link rel="icon" href="{{ asset('favicon_io/android-chrome-512x512.png') }}" sizes="512x512">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="antialiased">
    <header class="header">
        <img src="{{ asset('imgs/logo.png') }}" alt="Logo Sunflower School">
        <nav class="navbar">
            <a href="{{ url('/') }}" class ="btn">Inicio</a>
            <a href="{{ route('aboutUs') }}" class ="btn">Quienes somos</a>
            <!-- <a href="{{ route('generalParentCenter') }}" class ="btn">Centro general de padres</a> -->
            <a href="{{ route('gallery') }}" class ="btn">Galería</a>
            <!-- <a href="{{ route('specialist') }}" class ="btn">Especialistas</a> -->
            <a href="{{ route('registrationApplication') }}"class="btn">Solicitud de matrícula</a>
            @auth
                <a href="{{ route('login') }}" class="btn-login">{{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}</a>
            @else
                <a href="{{ route('login') }}" class="btn-login">Iniciar sesión</a>
            @endauth
        </nav>
    </header>

    <section class="title">
        <h1>Sunflower School</h1>
        <p>¡Que todos los niños aprendan!</p>
    </section>

    <footer class="footer">
        <p>Síguenos en nuestras redes sociales</p>
        <a
            href="https://www.facebook.com/groups/1323247857789710/?hoisted_section_header_type=recently_seen&multi_permalinks=5707977009316751">
            <img src="{{ asset('imgs/facebook.png') }}">
        </a>
    </footer>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.navbar a');

            links.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const href = this.getAttribute('href');

                    if (href) {
                        document.body.classList.add('animate-slideIn');
                        setTimeout(() => {
                            window.location.href = href;
                        }, 500); // Duración de la animación
                    }
                });
            });
        });
    </script> --}}

</body>

</html>
