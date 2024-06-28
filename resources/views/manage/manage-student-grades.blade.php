<title>Sunflower School | Administrar notas</title>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <!-- Icono y Título -->
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Administrar notas</li>
                        </ol>
                    </nav>
                    <div class="col-md-6" style="margin: 40px;">
                        <label for="selectCourse" class="form-label">Nombre del alumno: {{$student->first_name}} {{$student->last_name}}</label><br>
                        {{-- <label for="selectCourse" class="form-label">Curso: </label><br> --}}
                        <label for="selectCourse" class="form-label">Semestre: {{$current_semester->semester_name}}</label><br>
                    </div>
                    <div class="mb-4 p-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;">Asignatura</th>
                                    <th scope="col" style="text-align: center;">Notas parciales</th>
                                    <th scope="col" style="text-align: center, margin-left:2px;">Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>LENG. Y COMUNICACIÓN</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">


                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>INGLÉS</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">

                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>EDUC. MATEMÁTICAS</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">


                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>HISTORIA, GEOGR., Y SOC.</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">


                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>CIENCIAS NATURALES</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">


                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>EDUC. ARTÍSTICA</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">

                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>EDUC. TECNOLÓGICA</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">


                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>MÚSICA</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">

                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>EDUC. FÍSICA</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">

                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td>RELIGIÓN</td>
                                    <td>
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">
                                        <input type="number" class="grade-input" min="1" max="7" step="0.1" onchange="calculateAverage(this)">


                                    </td>
                                    <td class="average-cell"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary" style="align-self: center; color: black; border-color: black;"><i class="bi bi-check2"></i> Guardar</button>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>

<script>
function calculateAverage(element) {
    let row = element.closest('tr');
    let inputs = row.querySelectorAll('.grade-input');
    let sum = 0;
    let count = 0;
    inputs.forEach(input => {
        let value = parseFloat(input.value);
        if (!isNaN(value)) {
            sum += value;
            count++;
        }
    });
    let average = (count === 0) ? 0 : (sum / count).toFixed(2);
    row.querySelector('.average-cell').innerText = average;
}
</script>
@endsection
