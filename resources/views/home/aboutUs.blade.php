<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Colegio Sunflower</title>

    <link rel="shortcut icon" href="{{ asset('favicon_io/favicon.ico') }}">
    <link rel="shortcut icon" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="shortcut icon" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('favicon_io/android-chrome-192x192.png') }}" sizes="192x192">
    <link rel="icon" href="{{ asset('favicon_io/android-chrome-512x512.png') }}" sizes="512x512">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background: linear-gradient(to right, rgba(232, 172, 18, 1), rgba(51, 51, 51, 0));
            padding-top: 10px;
            padding-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .header img {
            height: 100px;
            margin-left: 30px;
        }

        .navbar {
            display: flex;
            gap: 30px;
            margin-right: 30px;
        }

        .navbar a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
            align-self: center;
            font-size: 1.25rem;
            margin-right:6px ;
        }

        .navbar a.btn {
            background-color: #1a202c;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .title {
            background-image: url('{{ asset('imgs/sunflowerbghome.png') }}');
            position: absolute;
            background-size: cover;
            background-position: center;
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            text-align: center;
            color: #fff;
            z-index: -1;
        }

        .title h1 {
            font-size: 7rem;
            margin: 0;
            margin-left: 35px;
            text-shadow: 2px 2px 2px #000;
        }

        .title p {
            font-size: 2rem;
            margin-left: 35px;
            text-shadow: 2px 2px 2px #000;
        }

        .footer {
            background: linear-gradient(to right, rgba(232, 172, 18, 1), rgba(51, 51, 51, 0));
            width: 97%;
            bottom: 0;
            height: 10%;
            display: flex;
            align-items: center;
        }

        .footer p {
            margin-left: 20px;
            color: #fff;
            text-shadow: 2px 2px 2px #000;
            font-size: 1.25rem;
        }

        .footer img {
            margin-left: 10px;
            width: 32px;
            height: 32px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1,
        h2 {
            font-weight: bold;
        }

        .testimonials .testimonial-item {
            margin-bottom: 20px;
        }

        .testimonials .testimonial-item h4 {
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>

<body class="antialiased">
    <header class="header">
        <img src="{{ asset('imgs/logo.png') }}" alt="Logo Colegio Sunflower">
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

    <div class="container mt-5">
        <h1 class="mb-4">Acerca de nosotros</h1>
        <p>
            <about us here>
        </p>

        <h2 class="mt-5">Testimonios</h2>
        <div class="testimonials mt-3">
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
