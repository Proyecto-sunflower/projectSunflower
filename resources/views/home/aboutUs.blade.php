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

<body class="about-us-container">
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

    <div class="testimonials-container">

        <h1 class="about-us-title">Acerca de nosotros</h1>

        <div class="mission-vision-container">
            <div class="mission-vision-inner-container">
                <h1 class="mb-4">Misión</h1>
                <p>Entregar una educación de calidad y equidad, permitiendo que los niños y jóvenes puedan ingresar a sus aulas para obtener 
                    una sólida formación moral, social, académica, respetando sus diferencias individuales, con renovados métodos pedagógicos 
                    que atiendan a la diversidad, dando cabal importancia a la participación de los padres y apoderados en el proceso de gestión educativa.
                </p>
            </div>

            <div class="mission-vision-inner-container">
                <h1 class="mb-4">Visión</h1>
                <p>Lograr que sus integrantes puedan acceder a los distintos niveles de 
                la educación, para que continúen con el proceso formador iniciado en sus hogares y lleguen a ser personas con alta motivación de superación 
                personal, de respeto a la vida y cuidado de la naturaleza.
                Se espera que los docentes sean cada vez más comprometidos en la tarea formadora y académica, entregando una educación de calidad y equidad, 
                formando niños y jóvenes críticos y autocríticas, con sólidos valores patrios, morales, sociales y de respeto con el medio ambiente.
                </p>
            </div>
        </div>
        
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
