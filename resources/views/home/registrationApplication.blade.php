<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunflower School | Solicitud de Matrícula</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            max-width: 600px;
            width: 100%;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin: 50px auto;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 2rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            justify-content: start;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            justify-content: start;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            gap: 1rem;
        }

        button {
            padding: 10px;
            font-size: 1rem;
            background-color: #e8ac12;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #d4970b;
        }

        .form-row {
            display: flex;
            gap: 2rem;
        }

        .form-row div {
            flex: 1;
        }

        .succes-msg {
            color: rgb(55, 170, 55);
            text-align: center;
        }
        .invalid-feedback {
            color: red;
        }
    </style>
</head>
<body>
    <header class="header">
        <img src="{{ asset('imgs/logo.png') }}" alt="Logo Sunflower School">
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
    <div class="container">
        <h1>Solicitud de matrícula</h1>
        <p>Por favor, rellene el formulario para solicitar el formulario</p>

        <!-- Formulario de inscripción -->
        <form action="{{ route('registrationApplication.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div>
                    <label for="first_name">Nombre</label>
                    <input type="text" id="first_name" name="first_name" required>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="last_name">Apellido</label>
                    <input type="text" id="last_name" name="last_name" required>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
            </div>
            <div>
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="phone">Teléfono (opcional)</label>
                <input type="text" id="phone" name="phone">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit">Enviar</button>

            @if (session('success'))
                <div class="succes-msg">
                    {{ session('success') }}
                </div>
            @endif
        </form>


    </div>
</body>
</html>
