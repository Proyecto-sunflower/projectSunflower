@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Edit Student
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Lista de Estudiantes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar Estudiante</li>
                        </ol>
                    </nav>

                    @include('session-messages')
                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.student.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <div class="row g-3">
                                <div class="col-3">
                                    <label for="inputFirstName" class="form-label">Nombre<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Nombre " required value="{{$student->first_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputLastName" class="form-label">Apellido<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Apellido" required value="{{$student->last_name}}">
                                </div>
                                {{-- <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Email<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" required value="{{$student->email}}">
                                </div> --}}
                                <div class="col-3">
                                    <label for="inputBirthday" class="form-label">Fecha de Nacimiento<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday" placeholder="Fecha de Nacimiento" required value="{{$student->birthday}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">Dirección #1<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="634 Main St" required value="{{$student->address}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress2" class="form-label">Dirección #2</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartment, studio, or floor" value="{{$student->address2}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputCity" class="form-label">Ciudad<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Dhaka..." required value="{{$student->city}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputZip" class="form-label">Código postal</label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" value="{{$student->zip}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputState" class="form-label">Género<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Male" {{($student->gender == 'Male')?'selected':null}}>Masculino</option>
                                        <option value="Female" {{($student->gender == 'Female')?'selected':null}}>Femenino</option>
                                        <option value="Female" {{($student->gender == 'Other')?'selected':null}}>Otro</option>

                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputNationality" class="form-label">Nacionalidad<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="ejemplo: Chilena, Argentina, Japonesa..." required value="{{$student->nationality}}">
                                </div>
                                {{-- <div class="col-2">
                                    <label for="inputBloodType" class="form-label">BloodType<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputBloodType" class="form-select" name="blood_type" required>
                                        <option value="A+" {{($student->blood_type == 'A+')?'selected':null}}>A+</option>
                                        <option value="A-" {{($student->blood_type == 'A-')?'selected':null}}>A-</option>
                                        <option value="B+" {{($student->blood_type == 'B+')?'selected':null}}>B+</option>
                                        <option value="B-" {{($student->blood_type == 'B-')?'selected':null}}>B-</option>
                                        <option value="O+" {{($student->blood_type == 'O+')?'selected':null}}>O+</option>
                                        <option value="O-" {{($student->blood_type == 'O-')?'selected':null}}>O-</option>
                                        <option value="AB+" {{($student->blood_type == 'AB+')?'selected':null}}>AB+</option>
                                        <option value="AB-" {{($student->blood_type == 'AB-')?'selected':null}}>AB-</option>
                                        <option value="Other" {{($student->blood_type == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="col-2">
                                    <label for="inputReligion" class="form-label">Religion<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option {{($student->religion == 'Islam')?'selected':null}}>Islamica</option>
                                        <option {{($student->religion == 'Hinduism')?'selected':null}}>Hinduista</option>
                                        <option {{($student->religion == 'Christianity')?'selected':null}}>Cristiana</option>
                                        <option {{($student->religion == 'Buddhism')?'selected':null}}>Budista</option>
                                        <option {{($student->religion == 'Judaism')?'selected':null}}>Jesuita</option>
                                        <option {{($student->religion == 'Other')?'selected':null}}>Otro</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="col-3">
                                    <label for="inputPhone" class="form-label">Telefono<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+569 98.. ...." required value="{{$student->phone}}">
                                </div> --}}
                                <div class="col-3">
                                    <label for="inputIdCardNumber" class="form-label">R.U.T<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputIdCardNumber" name="id_card_number" placeholder="e.g. 2021-03-01-02-01 (Year Semester Class Section Roll)" required value="{{$promotion_info->id_card_number}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Parents' Information</h6>
                                <div class="col-3">
                                    <label for="inputFatherName" class="form-label">Father Name<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherName" name="father_name" placeholder="Father Name" required value="{{$parent_info->father_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputFatherPhone" class="form-label">Father's Phone<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherPhone" name="father_phone" placeholder="+880 01......" required value="{{$parent_info->father_phone}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputMotherName" class="form-label">Mother Name<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherName" name="mother_name" placeholder="Mother Name" required value="{{$parent_info->mother_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputMotherPhone" class="form-label">Mother's Phone<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherPhone" name="mother_phone" placeholder="+880 01......" required value="{{$parent_info->mother_phone}}">
                                </div>
                                <div class="col-4">
                                    <label for="inputParentAddress" class="form-label">Address<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputParentAddress" name="parent_address" placeholder="634 Main St" required value="{{$parent_info->parent_address}}">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> Update</button>
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
@include('components.photos.photo-input')
@endsection
