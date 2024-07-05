<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunflower School | Solicitud de Matrícula</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="body-registration">

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

    <div class="container-registration">
        <h1 class="h1-registration">Solicitud de matrícula</h1>
        <p class="p-registration">Por favor, rellene el formulario para solicitar el formulario</p>

        <!-- Formulario de inscripción -->
        <form class="form-registration" action="{{ route('registrationApplication.store') }}" method="POST">
            @csrf
            <div class="form-row-registration">
                <div>
                    <label class="label-registration" for="first_name">Nombre</label>
                    <input class="input-registration" type="text" id="first_name" name="first_name" novalidate>
                    @error('first_name')
                        <span class="invalid-feedback-registration" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label class="label-registration" for="last_name">Apellido</label>
                    <input class="input-registration" type="text" id="last_name" name="last_name" novalidate>
                    @error('last_name')
                        <span class="invalid-feedback-registration" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
            </div>
            <div>
                <label class="label-registration" for="email">Correo electrónico</label>
                <input class="input-registration" type="email" id="email" name="email" novalidate>
                @error('email')
                    <span class="invalid-feedback-registration" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label class="label-registration" for="phone">Teléfono</label>
                <input class="input-registration" type="text" id="phone" name="phone" novalidate>
                @error('phone')
                    <span class="invalid-feedback-registration" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="button-registration" type="submit">Enviar</button>

            @if (session('success'))
                <div class="succes-msg">
                    {{ session('success') }}
                </div>
            @endif
        </form>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Solicutud de matrícula enviada con éxito!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</body>
</html>
