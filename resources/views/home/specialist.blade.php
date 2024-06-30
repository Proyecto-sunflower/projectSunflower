<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunflower School | Especialistas</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background: linear-gradient(to right, rgba(232, 172, 18, 1), rgba(51, 51, 51, 0));
            padding: 10px 0;
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
            max-width: 900px;
            width: 100%;
            padding: 20px;
            text-align: center;
            margin: 50px auto;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .specialist-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .specialist-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
        }

        .specialist-item img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .specialist-info {
            text-align: left;
        }

        .specialist-info h2 {
            font-size: 1.5rem;
            margin: 0;
        }

        .specialist-info p {
            margin: 5px 0;
            color: #666;
        }
    </style>
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

    <div class="container">
        <h1>Especialistas</h1>
        <ul class="specialist-list">
            <li class="specialist-item">
                <img src="{{ asset('imgs/specialist1.png') }}" alt="Foto especialista 1">
                <div class="specialist-info">
                    <h2>Nombre especialista 1</h2>
                    <p>Teléfono especialista</p>
                    <p>Correo electrónico especialista</p>
                </div>
            </li>
            <li class="specialist-item">
                <img src="{{ asset('imgs/specialist2.png') }}" alt="Foto especialista 2">
                <div class="specialist-info">
                    <h2>Nombre especialista 2</h2>
                    <p>Teléfono especialista</p>
                    <p>Correo electrónico especialista</p>
                </div>
            </li>
            <li class="specialist-item">
                <img src="{{ asset('imgs/specialist3.png') }}" alt="Foto especialista 3">
                <div class="specialist-info">
                    <h2>Nombre especialista 3</h2>
                    <p>Teléfono especialista</p>
                    <p>Correo electrónico especialista</p>
                </div>
            </li>
            <li class="specialist-item">
                <img src="{{ asset('imgs/specialist4.png') }}" alt="Foto especialista 4">
                <div class="specialist-info">
                    <h2>Nombre especialista 4</h2>
                    <p>Teléfono especialista</p>
                    <p>Correo electrónico especialista</p>
                </div>
            </li>
        </ul>
    </div>
</body>
</html>
