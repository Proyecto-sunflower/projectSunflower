<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centro General de Padres</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos para la transición de slide */
        .page-enter {
            opacity: 0;
            transform: translateX(-100%);
        }
        .page-enter-active {
            opacity: 1;
            transform: translateX(0);
            transition: opacity 0.5s, transform 0.5s;
        }
        .page-exit {
            opacity: 1;
            transform: translateX(0);
        }
        .page-exit-active {
            opacity: 0;
            transform: translateX(100%);
            transition: opacity 0.5s, transform 0.5s;
        }
        /* Estilos de la página */
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
            margin-right: 6px;
        }
        .navbar a.btn {
            background-color: #1a202c;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        h1, h2 {
            font-weight: bold;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .card-title {
            font-size: 18px;
            font-weight: bold;
        }
        .card-text {
            font-size: 14px;
        }
        .card-img-top {
            width: 100%;
            height: auto;
        }
        .footer {
            background: linear-gradient(to right, rgba(232, 172, 18, 1), rgba(51, 51, 51, 0));
            width: 97%;
            bottom: 0;
            height: 10%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>
<body>
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
    <div id="app" class="page">
        <div class="container mt-5">
            <h1 class="mb-4">Encargados del centro general de padres</h1>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="card mb-4">
                        <img src="{{ asset('imgs/member1.png') }}" class="card-img-top" alt="Foto miembro 1">
                        <div class="card-body">
                            <h5 class="card-title">Nombre miembro 1</h5>
                            <p class="card-text">Correo electrónico miembro 1</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card mb-4">
                        <img src="{{ asset('imgs/member2.png') }}" class="card-img-top" alt="Foto miembro 2">
                        <div class="card-body">
                            <h5 class="card-title">Nombre miembro 2</h5>
                            <p class="card-text">Correo electrónico miembro 2</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card mb-4">
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
