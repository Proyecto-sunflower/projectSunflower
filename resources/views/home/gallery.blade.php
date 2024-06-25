<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colegio Sunflower | Galería</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <header class="header">
        <img src="{{ asset('imgs/logo.png') }}" alt="Logo Colegio Sunflower">
        <nav class="navbar">
            <a href="{{ url('/') }}"  class ="btn">Inicio</a>
            <a href="{{ route('aboutUs') }}" class ="btn">Quienes somos</a>
            <a href="{{ route('generalParentCenter') }}" class ="btn">Centro general de padres</a>
            <a href="{{ route('gallery') }}" class ="btn">Galería</a>
            <a href="{{ route('specialist') }}" class ="btn">Especialistas</a>
            <a href="{{ route('registrationApplication') }}" class ="btn">Solicitud de matrícula</a>
            <a href="{{ route('login') }}" class="btn-login">Iniciar sesión</a>
        </nav>
    </header>

    <section class="gallery-title">
        <h1>Galería</h1>
    </section>

    <div class="container-gallery">
        <div class="gallery">
            <img src="{{ asset('imgs/gallery/imagen5.jpeg') }}" alt="Galería 1">
            <img src="{{ asset('imgs/gallery/imagen6.jpeg') }}" alt="Galería 2">
            <img src="{{ asset('imgs/gallery/imagen7.jpeg') }}" alt="Galería 3">
            <img src="{{ asset('imgs/gallery/imagen10.jpeg') }}" alt="Galería 3">
        </div>
    </div>

</body>

</html>
