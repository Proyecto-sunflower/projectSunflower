<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunflower School | Centro General de Padres</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

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

    <h1 class="general-parent-title">Encargados del centro general de padres</h1>
    <div id="app" class="page">
        <div class="general-parent-container">
            <div class="row-parent justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="card-parent">
                        <img src="{{ asset('imgs/member1.png') }}" class="card-img-top" alt="Foto miembro 1">
                        <div class="card-body">
                            <h5 class="card-title">Nombre miembro 1</h5>
                            <p class="card-text">Correo electrónico miembro 1</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card-parent">
                        <img src="{{ asset('imgs/member2.png') }}" class="card-img-top" alt="Foto miembro 2">
                        <div class="card-body">
                            <h5 class="card-title">Nombre miembro 2</h5>
                            <p class="card-text">Correo electrónico miembro 2</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card-parent">
                        <img src="{{ asset('imgs/member3.png') }}" class="card-img-top" alt="Foto miembro 3">
                        <div class="card-body">
                            <h5 class="card-title">Nombre miembro 3</h5>
                            <p class="card-text">Correo electrónico miembro 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.navbar a');
            const app = document.getElementById('app');
            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = this.getAttribute('href');
                    app.classList.add('page-exit');
                    setTimeout(() => {
                        window.location.href = target;
                    }, 500);
                });
            });
            window.addEventListener('pageshow', function (event) {
                if (event.persisted) {
                    app.classList.remove('page-exit');
                }
                app.classList.add('page-enter');
                setTimeout(() => {
                    app.classList.remove('page-enter');
                }, 500);
            });
        });
    </script>
</body>
</html>
