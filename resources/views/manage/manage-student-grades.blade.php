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
                        @if ($current_semester)
                        <label for="selectCourse" class="form-label">Semestre: {{$current_semester->semester_name}}</label><br>
                        @else
                        <label for="selectCourse" class="form-label">Semestre: No disponible</label><br>
                        @endif
                    </div>
                    <div class="mb-4 p-3">
                        <form action="{{ route('grades.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;">Asignatura</th>
                                        <th scope="col" style="text-align: center;">Notas parciales</th>
                                        <th scope="col" style="text-align: center, margin-left:2px;">Promedio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->name }}</td>
                                        <td>
                                            @for ($i = 0; $i < 12; $i++)
                                            @if (isset($loop) && isset($loop->parent))
                                            <input type="number" class="grade-input" min="1" max="7" step="0.1" name="grades[{{ $loop->parent->index }}][grades][]" onchange="calculateAverage(this)">
                                            @else
                                            <input type="number" class="grade-input" min="1" max="7" step="0.1" name="grades[{{ $i }}][grades][]" onchange="calculateAverage(this)">
                                            @endif
                                            @endfor
                                        </td>
                                        <td class="average-cell"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="display: flex; justify-content: center;">
                                <button type="submit" class="mt-3 btn btn-sm btn-outline-primary" style="align-self: center; color: black; border-color: black;"><i class="bi bi-check2"></i> Guardar</button>
                            </div>
                        </form>
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
