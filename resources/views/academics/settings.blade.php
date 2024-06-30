<title>Sunflower School | Configurar año académico</title>

@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <div class="container">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h1 class="display-6 mb-3">
                            <i class="bi bi-tools"></i> Configuraciones año académico <!--Academic Settings -->
                        </h1>

                        @include('session-messages')

                        <div class="mb-4">
                            <div class="row" data-masonry='{"percentPosition": true }'>
                                @if ($latest_school_session_id == $current_school_session_id)
                                    <div class="col-md-4 mb-4">
                                        <div class="p-3 border bg-light shadow-sm">
                                            <h6>Crear año académico</h6>
                                            <p class="text-danger">
                                                <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Es importante
                                                    primero crear el año académico para poder usar las funciones del
                                                    sistema</small>
                                            </p>
                                            <form action="{{ route('school.session.store') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="2021 - 2022" aria-label="Current Session"
                                                        name="session_name" required>
                                                </div>
                                                <button class="btn btn-sm btn-outline-primary" type="submit"><i
                                                        class="bi bi-check2"></i> Crear</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if ($latest_school_session_id == $current_school_session_id)
                                    <div class="col-md-4 mb-4">
                                        <div class="p-3 border bg-light shadow-sm">
                                            <h6>Crear semestre para el año académico actual</h6>
                                            <form action="{{ route('school.semester.create') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="session_id"
                                                    value="{{ $current_school_session_id }}">
                                                <div class="mt-2">
                                                    <p>Nombre del semestre<sup><i
                                                                class="bi bi-asterisk text-primary"></i></sup></p>
                                                    <select class="form-control form-control-sm" name="semester_name"
                                                        required>
                                                        <option value="" disabled selected>Seleccione el semestre
                                                        </option>
                                                        <option value="Primer semestre {{ now()->year }}">Primer semestre
                                                            {{ now()->year }}</option>
                                                        <option value="Segundo semestre {{ now()->year }}">Segundo
                                                            semestre {{ now()->year }}</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <label for="inputStarts" class="form-label">Empieza<sup><i
                                                                class="bi bi-asterisk text-primary"></i></sup></label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        id="inputStarts" placeholder="Starts" name="start_date" required>
                                                </div>
                                                <div class="mt-2">
                                                    <label for="inputEnds" class="form-label">Termina<sup><i
                                                                class="bi bi-asterisk text-primary"></i></sup></label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        id="inputEnds" placeholder="Ends" name="end_date" required>
                                                </div>
                                                <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-check2"></i> Crear</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="p-3 border bg-light shadow-sm">
                                            <h6>Crear curso</h6>
                                            <p class="text-danger">
                                                <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Ej:
                                                    A,B,C,D...</small>
                                            </p>
                                            <form action="{{ route('school.class.create') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="session_id"
                                                    value="{{ $current_school_session_id }}">
                                                <div class="mb-3 mt-1">
                                                    <select class="form-control form-control-sm" name="class_name" required>
                                                        <option value="" disabled selected>Seleccione el curso
                                                        </option>
                                                        @foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $class)
                                                            <option value="{{ $class }}">Curso {{ $class }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-sm btn-outline-primary" type="submit"><i
                                                        class="bi bi-check2"></i> Crear</button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Buscar por sesión</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Utilízalo sólo cuando quieras buscar datos de sesiones anteriores. <!--Only use this when you want to browse data from previous Sessions.--></small>
                                    </p>
                                    <form action="{{route('school.session.browse')}}" method="POST">
                                        @csrf
                                    <div class="mb-3">
                                        <p class="mt-2">Seleccione "Sesión" para buscar por:<!--Select "Session" to browse by:--></p>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm" name="session_id" required>
                                            @isset($school_sessions)
                                                @foreach ($school_sessions as $school_session)
                                                    <option value="{{$school_session->id}}">{{$school_session->session_name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Colocar <!--Set--></button>
                                    </form>
                                </div>
                            </div> --}}

                                    {{-- <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Tipo de asistencia <!--Attendance Type--></h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> No cambie el tipo a mitad de un semestre. <!--Do not change the type in the middle of a Semester.--></small>
                                    </p>
                                    <form action="{{route('school.attendance.type.update')}}" method="POST">
                                        @csrf
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type" id="attendance_type_section" {{($academic_setting->attendance_type == 'section')?'checked="checked"':null}} value="section">
                                            <label class="form-check-label" for="attendance_type_section">
                                                Asistencia por sección
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type" id="attendance_type_course" {{($academic_setting->attendance_type == 'course')?'checked="checked"':null}} value="course">
                                            <label class="form-check-label" for="attendance_type_course">
                                                Asistencia por curso
                                            </label>
                                        </div>

                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Guardar</button>
                                    </form>
                                </div>
                            </div> --}}

                                    <div class="col-md-4 mb-4">
                                        <div class="p-3 border bg-light shadow-sm">
                                            <h6>Crear nivel</h6>
                                            <p class="text-danger">
                                                <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Ej:
                                                    1,2,3,4...8</small>
                                            </p>
                                            <form action="{{ route('school.section.create') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="session_id"
                                                    value="{{ $current_school_session_id }}">
                                                <div class="mb-3">
                                                    <select class="form-control form-control-sm"  name="section_name"
                                                        required>
                                                        <option value="" disabled selected><i
                                                                class="bi bi-check2">Seleccione el nivel </option>
                                                        @for ($i = 1; $i <= 8; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                {{-- <div class="mb-3">
                                            <input class="form-control form-control-sm" name="room_no" type="text" placeholder="Room No." required>
                                        </div> --}}
                                                <div>
                                                    <p>Asignar nivel al curso</p>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                        @isset($school_classes)
                                                            @foreach ($school_classes as $school_class)
                                                                <option value="{{ $school_class->id }}">{{ $school_class->class_name }}</option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                                <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-check2"></i> Guardar</button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Crear curso</h6>

                                    <form action="{{route('school.course.create')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-1">
                                            <input type="text" class="form-control form-control-sm" name="course_name" placeholder="Ej: 4°A" aria-label="Course name" required>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mt-2">Tipo de curso:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" name="course_type" aria-label=".form-select-sm" required>
                                                <option value="Core">Principal <!--Core--></option>
                                                <option value="General">General</option>
                                                <option value="Elective">Electivo</option>
                                                <option value="Optional">Opcional</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Asignar al semestre:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="semester_id" required>
                                                @isset($semesters)
                                                    @foreach ($semesters as $semester)
                                                    <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Asignar a la clase:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                @isset($school_classes)
                                                    @foreach ($school_classes as $school_class)
                                                    <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Crear</button>
                                    </form>
                                </div>
                            </div> --}}

                                    <div class="col-md-4 mb-4">
                                        <div class="p-3 border bg-light shadow-sm">
                                            <h6>Asignar profesor/a</h6>
                                            <form action="{{ route('school.teacher.assign') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="session_id"
                                                    value="{{ $current_school_session_id }}">
                                                <div class="mb-3">
                                                    <p class="mt-2">Seleccionar profesor/a:<sup><i
                                                                class="bi bi-asterisk text-primary"></i></sup></p>
                                                    <select class="form-select form-select-sm"
                                                        aria-label=".form-select-sm" name="teacher_id" required>
                                                        @isset($teachers)
                                                            @foreach ($teachers as $teacher)
                                                                <option value="{{ $teacher->id }}">
                                                                    {{ $teacher->first_name }} {{ $teacher->last_name }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <p>Asignar al semestre:<sup><i
                                                                class="bi bi-asterisk text-primary"></i></sup></p>
                                                    <select class="form-select form-select-sm"
                                                        aria-label=".form-select-sm" name="semester_id" required>
                                                        @isset($semesters)
                                                            @foreach ($semesters as $semester)
                                                                <option value="{{ $semester->id }}">
                                                                    {{ $semester->semester_name }}</option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div>
                                                    <p>Asignar a la clase:<sup><i
                                                                class="bi bi-asterisk text-primary"></i></sup></p>
                                                    <select onchange="getSectionsAndCourses(this);"
                                                        class="form-select form-select-sm" aria-label=".form-select-sm"
                                                        name="class_id" required>
                                                        @isset($school_classes)
                                                            <option selected disabled>Por favor seleccione un curso</option>
                                                            @foreach ($school_classes as $school_class)
                                                                <option value="{{ $school_class->id }}">
                                                                    {{ $school_class->class_name }}</option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div>
                                                    <p class="mt-2">Asignar al nivel:<sup><i
                                                                class="bi bi-asterisk text-primary"></i></sup></p>
                                                    <select class="form-select form-select-sm" id="section-select"
                                                        aria-label=".form-select-sm" name="section_id" required>
                                                    </select>
                                                </div>
                                                {{-- <div>
                                            <p class="mt-2">Asignar al curso:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="course-select" aria-label=".form-select-sm" name="course_id" required>
                                            </select>
                                        </div> --}}
                                                <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-check2"></i> Guardar</button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Permitir el envío de calificaciones finales<!--Allow Final Marks Submission--></h6>
                                    <form action="{{route('school.final.marks.submission.status.update')}}" method="POST">
                                        @csrf
                                        <p class="text-danger">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Por lo general, a los profesores se les permite enviar las calificaciones finales justo antes del final de un "semestre".<!--Usually teachers are allowed to submit final marks just before the end of a "Semester".--></small>
                                        </p>
                                        <p class="text-primary">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> No permitir al inicio de un "Semestre".<!--Disallow at the start of a "Semester".--></small>
                                        </p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="marks_submission_status" id="marks_submission_status_check" {{($academic_setting->marks_submission_status == 'on')?'checked="checked"':null}}>
                                            <label class="form-check-label" for="marks_submission_status_check">{{($academic_setting->marks_submission_status == 'on')?'Activado':'Desactivado'}}</label>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Guardar</button>
                                    </form>
                                </div>
                            </div> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <script>
        function getSectionsAndCourses(obj) {
            var class_id = obj.options[obj.selectedIndex].value;

            var url = "{{ route('get.sections.courses.by.classId') }}?class_id=" + class_id

            fetch(url)
                .then((resp) => resp.json())
                .then(function(data) {
                    var sectionSelect = document.getElementById('section-select');
                    sectionSelect.options.length = 0;
                    data.sections.unshift({
                        'id': 0,
                        'section_name': 'Por favor, seleccione un nivel'
                    })
                    data.sections.forEach(function(section, key) {
                        sectionSelect[key] = new Option(section.section_name, section.id);
                    });

                    var courseSelect = document.getElementById('course-select');
                    courseSelect.options.length = 0;
                    data.courses.unshift({
                        'id': 0,
                        'course_name': 'Please select a course'
                    })
                    data.courses.forEach(function(course, key) {
                        courseSelect[key] = new Option(course.course_name, course.id);
                    });
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
