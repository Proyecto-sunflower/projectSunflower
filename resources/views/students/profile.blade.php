@extends('layouts.app')

@section('content')
<style>
/* .table th:first-child,
.table td:first-child {
  position: relative;
  background-color: #f8f9fa;
} */
</style>
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Student
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                          <li class="breadcrumb-item"><a href="{{route('student.list.show')}}">Lista de Estudiantes</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                        </ol>
                    </nav>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="card bg-light">
                                    <div class="px-5 pt-2">
                                        @if (isset($student->photo))
                                            <img src="{{asset('/storage'.$student->photo)}}" class="rounded-3 card-img-top" alt="Profile photo">
                                        @else
                                            <img src="{{asset('imgs/profile.png')}}" class="rounded-3 card-img-top" alt="Profile photo">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$student->first_name}} {{$student->last_name}}</h5>
                                        <p class="card-text">#ID: {{$promotion_info->id_card_number}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Gender: {{$student->gender}}</li>
                                        <li class="list-group-item">Phone: {{$student->phone}}</li>
                                        {{-- <li class="list-group-item"><a href="#">View Marks &amp; Results</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Student Information</h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombre:</th>
                                                <td>{{$student->first_name}}</td>
                                                <th>Apellido:</th>
                                                <td>{{$student->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email:</th>
                                                <td>{{$student->email}}</td>
                                                <th>Fecha de Nacimiento:</th>
                                                <td>{{$student->birthday}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nationality:</th>
                                                <td>{{$student->nationality}}</td>
                                                <th>Religion:</th>
                                                <td>{{$student->religion}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direccion:</th>
                                                <td>{{$student->address}}</td>
                                                <th>Direccion2:</th>
                                                <td>{{$student->address2}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ciudad:</th>
                                                <td>{{$student->city}}</td>
                                                <th>Código Postal:</th>
                                                <td>{{$student->zip}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tipo de Sangre:</th>
                                                <td>{{$student->blood_type}}</td>
                                                <th>Teléfono:</th>
                                                <td>{{$student->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Género:</th>
                                                <td colspan="3">{{$student->gender}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion de los Apoderados</h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombre del Padre:</th>
                                                <td>{{$student->parent_info->main_parent_name}}</td>
                                                <th>Nombre de la Madre:</th>
                                                <td>{{$student->parent_info->substitute_name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Teléfono del Padre:</th>
                                                <td>{{$student->parent_info->main_parent_phone}}</td>
                                                <th>Teléfono de la Madre:</th>
                                                <td>{{$student->parent_info->substitute_phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direccion:</th>
                                                <td colspan="3">{{$student->parent_info->main_parent_address}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion académica</h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Class:</th>
                                                <td>{{$promotion_info->section->schoolClass->class_name}}</td>
                                                <th>Board Reg. No.:</th>
                                                {{-- <td>{{$student->academic_info->board_reg_no}}</td> --}}
                                            </tr>
                                            <tr>
                                                <th scope="row">Section:</th>
                                                <td colspan="3">{{$promotion_info->section->section_name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
