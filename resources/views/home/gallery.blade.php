<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colegio Sunflower | Galería</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
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
            justify-content: center;
        }


        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1,
        h2 {
            font-weight: bold;
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

</body>

</html>
