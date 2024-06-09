<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Colegio Sunflower</title>

    <link rel="shortcut icon" href="{{asset('favicon_io/favicon.ico')}}">
    <link rel="shortcut icon" sizes="16x16" href="{{asset('favicon_io/favicon-16x16.png')}}">
    <link rel="shortcut icon" sizes="32x32" href="{{asset('favicon_io/favicon-32x32.png')}}">
    <link rel="apple-touch-icon" href="{{asset('favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('favicon_io/android-chrome-192x192.png')}}" sizes="192x192">
    <link rel="icon" href="{{asset('favicon_io/android-chrome-512x512.png')}}" sizes="512x512">

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
            background-color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            height: 50px;
        }

        .navbar {
            display: flex;
            gap: 15px;
        }

        .navbar a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .navbar a.btn {
            background-color: #1a202c;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .hero {
            background-image: url('{{ asset('images/sunflower-background.jpg') }}'); /* Cambia esto al path de tu imagen */
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .hero h1 {
            font-size: 4rem;
            margin: 0;
        }

        .hero p {
            font-size: 1.5rem;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 5px;
        }
    </style>
</head>
<body class="antialiased">
    <header class="header">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio Sunflower">
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">Quienes somos</a>
            <a href="#">Centro general de padres</a>
            <a href="#">Galería</a>
            <a href="#">Solicitud de matrícula</a>
            <a href="#">Especialistas</a>
            <a href="{{ route('login') }}" class="btn">Iniciar sesión</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Colegio Sunflower</h1>
        <p>Insertar slogan aquí</p>
    </section>

    <footer class="footer">
        <p>Síguenos en nuestras redes sociales:</p>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </footer>
</body>
</html>
