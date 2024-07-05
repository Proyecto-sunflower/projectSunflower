<title>Sunflower School | Agregar estudiante</title>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h1 class="display-6 mb-3">
                            <i class="bi bi-person-lines-fill"></i> Agregar estudiante
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Agregar estudiante</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <p class="text-primary">
                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i>
                                Recuerde crear un "curso" y un "grado" relacionadas antes de agregar un
                                estudiante.</small>
                            </p>
                            <div class="mb-4">
                                <form class="row g-3" action="{{ route('school.student.create') }}" method="POST">
                                    @csrf
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="inputFirstName" class="form-label">Nombres<sup><i
                                            class="bi bi-asterisk text-primary"></i></sup></label>
                                            <input type="text" class="form-control" id="inputFirstName" name="first_name"
                                            placeholder="Ingresar nombres aquí" required value="{{ old('first_name') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputLastName" class="form-label">Apellidos<sup><i
                                                class="bi bi-asterisk text-primary"></i></sup></label>
                                                <input type="text" class="form-control" id="inputLastName" name="last_name"
                                                placeholder="Ingresar apellidos aquí" required value="{{ old('last_name') }}">
                                            </div>
                                            <div class="col-5-md">
                                                <label for="inputIdCardNumber" class="form-label">R.U.T<sup><i
                                                            class="bi bi-asterisk text-primary"></i></sup></label>
                                                <input type="text" class="form-control" id="inputIdCardNumber"
                                                    name="id_card_number" placeholder="Ej: 11.111.111-1" required
                                                    value="{{ old('id_card_number') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputBirthday" class="form-label">Fecha de nacimiento<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="date" class="form-control" id="inputBirthday" name="birthday"
                                            placeholder="Birthday" required value="{{ old('birthday') }}">
                                    </div>
                                    <div class="col-3-md">
                                        <label for="inputAddress" class="form-label">Dirección principal<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputAddress" name="address"
                                            placeholder="Ej: Avenida Génerica #123" required value="{{ old('address') }}">
                                    </div>
                                    <div class="col-3-md">
                                        <label for="inputAddress2" class="form-label">Dirección #2</label>
                                        <input type="text" class="form-control" id="inputAddress2" name="address2"
                                            placeholder="Ej: Avenida Génerica #123" value="{{ old('address2') }}">
                                    </div>
                                    <div class="col-3-md">
                                        <input type="checkbox" id="sameAddress" name="sameAddress"
                                            onchange="toggleSecondaryAddress()">
                                        <label for="sameAddress"> ¿Misma dirección?</label><br>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="inputCity" class="form-label">Ciudad<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputCity" name="city"
                                            placeholder="Ej: Antofagasta, Calama..." required value="{{ old('city') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputZip" class="form-label">Código postal</label>
                                        <input type="text" class="form-control" id="inputZip" name="zip"
                                            placeholder="Ej: Avenida Génerica #123">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputState" class="form-label">Género<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <select id="inputState" class="form-select" name="gender" required>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                                Masculino
                                            </option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                                Femenino
                                            </option>
                                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>
                                                Otro
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputNationality" class="form-label">Nacionalidad<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputNationality"
                                            name="nationality" placeholder="Ej: Chileno, ..." required
                                            value="{{ old('nationality') }}">
                                    </div>
                                </div>
                                <div class="row mt-4 g-3">
                                    <h6>Información de los apoderados</h6>
                                    <div class="col-md-3">
                                        <label for="inputFatherName" class="form-label">Apoderado principal<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputFatherName"
                                            name="main_parent_name" placeholder="Nombre del apoderado/a" required
                                            value="{{ old('main_parent_name') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputFatherPhone" class="form-label">Teléfono apoderado
                                            principal<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputFatherPhone"
                                            name="main_parent_phone" placeholder="Ej: +56912345678" required
                                            value="{{ old('main_parent_phone') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputMotherName" class="form-label">Apoderado suplente<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputMotherName"
                                            name="substitute_name" placeholder="Nombre del apoderado/a" required
                                            value="{{ old('substitute_name') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputMotherPhone" class="form-label">Teléfono apoderado
                                            suplente<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputMotherPhone"
                                            name="substitute_phone" placeholder="Ej: +56912345678" required
                                            value="{{ old('substitute_phone') }}">
                                    </div>
                                    <div class="col-4-md">
                                        <label for="inputParentAddress" class="form-label">Dirección apoderado
                                            principal<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputParentAddress"
                                            name="main_parent_address" placeholder="Ej: Avenida Génerica #123" required
                                            value="{{ old('main_parent_address') }}">
                                    </div>
                                    <div class="col-4-md">
                                        <label for="inputParentAddress2" class="form-label">Dirección apoderado
                                            suplente<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" class="form-control" id="inputParentAddress2"
                                            name="substitute_address" placeholder="Ej: Avenida Génerica #123" required
                                            value="{{ old('substitute_address') }}">
                                    </div>
                                    <div class="col-3-md">
                                        <input type="checkbox" id="sameAddressParents" name="sameAddressParents"
                                            onchange="toggleParentAddress()">
                                        <label for="sameAddressParents"> ¿Misma dirección para el apoderado?</label><br>
                                    </div>
                                </div>
                                <div class="row mt-4 g-3">
                                    <h6>Información académica</h6>
                                    <div class="col-md-6">
                                        <label for="inputAssignToClass" class="form-label">Asignar al curso:<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <select onchange="getSections(this);" class="form-select" id="inputAssignToClass"
                                            name="class_id">
                                            @isset($school_classes)
                                                <option selected disabled>Por favor, ingrese el curso</option>
                                                @foreach ($school_classes as $school_class)
                                                    <option value="{{ $school_class->id }}">{{ $school_class->class_name }}
                                                    </option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputAssignToSection" class="form-label">Asignar el grado:<sup><i
                                                    class="bi bi-asterisk text-primary"></i></sup></label>
                                        <select class="form-select" id="inputAssignToSection" name="section_id">
                                        </select>
                                    </div>
                                    <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12-md">
                                        <button type="submit" class="btn btn-sm btn-outline-primary"><i
                                                class="bi bi-person-plus"></i> Agregar estudiante</button>
                                    </div>
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
        function getSections(obj) {
            var class_id = obj.options[obj.selectedIndex].value;

            var url = "{{ route('get.sections.courses.by.classId') }}?class_id=" + class_id

            fetch(url)
                .then((resp) => resp.json())
                .then(function(data) {
                    var sectionSelect = document.getElementById('inputAssignToSection');
                    sectionSelect.options.length = 0;
                    data.sections.unshift({
                        'id': 0,
                        'section_name': 'Por favor, seleccione el grado'
                    })
                    data.sections.forEach(function(section, key) {
                        sectionSelect[key] = new Option(section.section_name, section.id);
                    });
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function toggleSecondaryAddress() {
            const secondaryAddress = document.getElementById('inputAddress2');
            if (document.getElementById('sameAddress').checked) {
                secondaryAddress.disabled = true;
                secondaryAddress.value = document.getElementById('inputAddress').value;
                secondaryAddress.style.cursor = "not-allowed";
            } else {
                secondaryAddress.disabled = false;
                secondaryAddress.value = "";
                secondaryAddress.style.cursor = "auto";
            }
        }

        function toggleParentAddress() {
            const mainParentAddress = document.getElementById('inputParentAddress');
            const substituteParentAddress = document.getElementById('inputParentAddress2');
            if (document.getElementById('sameAddressParents').checked) {
                substituteParentAddress.disabled = true;
                substituteParentAddress.value = mainParentAddress.value;
                substituteParentAddress.style.cursor = "not-allowed";
            } else {
                substituteParentAddress.disabled = false;
                substituteParentAddress.value = "";
                substituteParentAddress.style.cursor = "auto";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Estudiante registrado!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>


    @include('components.photos.photo-input')
@endsection
