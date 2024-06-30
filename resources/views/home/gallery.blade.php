<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunflower School | Galería</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <header class="header-gallery">
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

    <section class="gallery-title">
        <h1>Galería</h1>
    </section>

    <div class="container-gallery" id="imageContainer">
        <div class="gallery">
            <img src="{{ asset('imgs/gallery/imagen5.jpeg') }}" alt="Galería 1">
            <img src="{{ asset('imgs/gallery/imagen6.jpeg') }}" alt="Galería 2">
            <img src="{{ asset('imgs/gallery/imagen7.jpeg') }}" alt="Galería 3">
            <img src="{{ asset('imgs/gallery/imagen10.jpeg') }}" alt="Galería 4">
            <img src="{{ asset('imgs/gallery/imagen3.jpeg') }}" alt="Galería 5">
            <img src="{{ asset('imgs/gallery/imagen2.jpeg') }}" alt="Galería 6">
            <img src="{{ asset('imgs/gallery/imagen.jpeg') }}" alt="Galería 7">
            <img src="{{ asset('imgs/gallery/imagen9.jpeg') }}" alt="Galería 8">

            <!-- Duplicado -->

            <img src="{{ asset('imgs/gallery/imagen5.jpeg') }}" alt="Galería 1">
            <img src="{{ asset('imgs/gallery/imagen6.jpeg') }}" alt="Galería 2">
            <img src="{{ asset('imgs/gallery/imagen7.jpeg') }}" alt="Galería 3">
            <img src="{{ asset('imgs/gallery/imagen10.jpeg') }}" alt="Galería 4">
            <img src="{{ asset('imgs/gallery/imagen3.jpeg') }}" alt="Galería 5">
            <img src="{{ asset('imgs/gallery/imagen2.jpeg') }}" alt="Galería 6">
            <img src="{{ asset('imgs/gallery/imagen.jpeg') }}" alt="Galería 7">
            <img src="{{ asset('imgs/gallery/imagen9.jpeg') }}" alt="Galería 8">
        </div>
    </div>

    <script>
        const container = document.getElementById('imageContainer');
        const gallery = container.querySelector('.gallery');

        let scrollAmount = 0;
        const scrollStep = 1; 
        const scrollInterval = 20; 

        function scrollImages() {
            if (scrollAmount < gallery.scrollWidth - container.clientWidth) {
                container.scrollLeft += scrollStep;
                scrollAmount += scrollStep;
            } else {
                scrollAmount = 0;
                container.scrollLeft = 0;
            }
        }

        setInterval(scrollImages, scrollInterval);
    </script>

</body>

</html>
