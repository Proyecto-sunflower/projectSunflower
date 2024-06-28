<div class="col-xs-1 col-sm-1 col-md-1 col-lg-2 col-xl-2 col-xxl-2 border-rt-e6 px-0">
    <div class="d-flex flex-column align-items-center align-items-sm-start ">
                <ul class="nav flex-column pt-2 w-100">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home')? 'active' : '' }}" href="{{url('home')}}"><i class="ms-auto bi bi-grid"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Panel de inicio</span></a>
                    </li>
                    {{-- @if (Auth::user()->role == "teacher")
                    <li class="nav-item">
                        <a type="button" href="{{url('attendances')}}" class="d-flex nav-link {{ request()->is('attendances*')? 'active' : '' }}"><i class="bi bi-calendar2-week"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Attendance</span></a>
                    </li>
                    @endif --}}
                    @can('view classes')
                    <li class="nav-item">
                        @php
                            if (session()->has('browse_session_id')){
                                $classCount = \App\Models\SchoolClass::where('session_id', session('browse_session_id'))->count();
                            } else {
                                $latest_session = \App\Models\SchoolSession::latest()->first();
                                if($latest_session) {
                                    $classCount = \App\Models\SchoolClass::where('session_id', $latest_session->id)->count();
                                } else {
                                    $classCount = 0;
                                }
                            }
                        @endphp
                        <a class="nav-link d-flex {{ request()->is('classes')? 'active' : '' }}" href="{{url('classes')}}"><i class="bi bi-diagram-3"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Cursos</span> <span class="ms-auto d-inline d-sm-none d-md-none d-xl-inline">{{ $classCount }}</span></a>
                    </li>
                    @endcan
                    @if(Auth::user()->role != "student")
                    <li class="nav-item">
                        {{-- <a type="button" href="#student-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('students*')? 'active' : '' }}"><i class="bi bi-person-lines-fill"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Estudiantes</span> --}}
                        <a type="button" href="#student-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('students*')? 'active' : '' }}"><i class="bi bi-person-lines-fill"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Estudiantes</span>
                            <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                        </a>
                        <ul class="nav collapse {{ request()->is('students*')? 'show' : 'hide' }} bg-white" id="student-submenu">
                            <li class="nav-item w-100" {{ request()->routeIs('student.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('student.list.show')}}"><i class="bi bi-person-video2 me-2"></i> Ver estudiante</a></li>
                            @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
                            <li class="nav-item w-100" {{ request()->routeIs('student.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('student.create.show')}}"><i class="bi bi-person-plus me-2"></i> Agregar estudiante</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a type="button" href="#teacher-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('teachers*')? 'active' : '' }}"><i class="bi bi-person-lines-fill"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Profesores</span>
                            <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                        </a>
                        <ul class="nav collapse {{ request()->is('teachers*')? 'show' : 'hide' }} bg-white" id="teacher-submenu">
                            <li class="nav-item w-100" {{ request()->routeIs('teacher.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('teacher.list.show')}}"><i class="bi bi-person-video2 me-2"></i> Ver profesores</a></li>
                            @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
                            <li class="nav-item w-100" {{ request()->routeIs('teacher.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('teacher.create.show')}}"><i class="bi bi-person-plus me-2"></i> Agregar profesor</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->role == "teacher")
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('courses/teacher*') || request()->is('courses/assignments*'))? 'active' : '' }}" href="{{route('course.teacher.list.show', ['teacher_id' => Auth::user()->id])}}"><i class="bi bi-journal-medical"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Mis cursos</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role == "student")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('student.attendance.show')? 'active' : '' }}" href="{{route('student.attendance.show', ['id' => Auth::user()->id])}}"><i class="bi bi-calendar2-week"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Attendance</span></a>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('course.student.list.show')? 'active' : '' }}" href="{{route('course.student.list.show', ['student_id' => Auth::user()->id])}}"><i class="bi bi-journal-medical"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Cursos</span></a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-file-post"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Assignments</span></a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-cloud-sun"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Marks</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-journal-text"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Syllabus</span></a>
                    </li> --}}
                    <li class="nav-item border-bottom">
                        @php
                            if (session()->has('browse_session_id')){
                                $class_info = \App\Models\Promotion::where('session_id', session('browse_session_id'))->where('student_id', Auth::user()->id)->first();
                            } else {
                                $latest_session = \App\Models\SchoolSession::latest()->first();
                                if($latest_session) {
                                    $class_info = \App\Models\Promotion::where('session_id', $latest_session->id)->where('student_id', Auth::user()->id)->first();
                                } else {
                                    $class_info = [];
                                }
                            }
                        @endphp
                        <a class="nav-link" href="{{route('section.routine.show', [
                            'class_id'  => $class_info->class_id,
                            'section_id'=> $class_info->section_id
                        ])}}"><i class="bi bi-calendar4-range"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Routine</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role != "student")
                    <li class="nav-item border-bottom">
                        <a class="nav-link {{ request()->is('manageGrades')? 'active' : '' }}" href="{{url('manageGrades')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin-bottom: 10px;" fill="#000000" height="16px" width="16px" version="1.1" id="Capa_1" viewBox="0 0 470 470" xml:space="preserve">
                            <g>
                                <path d="M330.75,123.872h12.5v12.5c0,4.143,3.357,7.5,7.5,7.5s7.5-3.357,7.5-7.5v-12.5h12.5c4.143,0,7.5-3.357,7.5-7.5   s-3.357-7.5-7.5-7.5h-12.5v-12.5c0-4.143-3.357-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v12.5h-12.5c-4.143,0-7.5,3.357-7.5,7.5   S326.607,123.872,330.75,123.872z"/>
                                <path d="M263.88,180.557c3.826,1.589,8.214-0.231,9.799-4.059l10.703-25.84h28.736l10.703,25.84   c1.196,2.889,3.988,4.632,6.932,4.632c0.956,0,1.929-0.185,2.867-0.573c3.827-1.585,5.645-5.972,4.059-9.799l-12.614-30.454   c-0.015-0.038-0.03-0.075-0.046-0.112l-19.339-46.69c-1.16-2.803-3.896-4.63-6.929-4.63s-5.769,1.827-6.929,4.63l-19.346,46.705   c-0.011,0.025-0.021,0.05-0.031,0.076l-12.623,30.475C258.235,174.585,260.053,178.972,263.88,180.557z M298.75,115.971   l8.155,19.688h-16.31L298.75,115.971z"/>
                                <path d="M117.5,75H185c4.143,0,7.5-3.357,7.5-7.5S189.143,60,185,60h-67.5c-4.143,0-7.5,3.357-7.5,7.5S113.357,75,117.5,75z"/>
                                <path d="M117.5,120H185c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5h-67.5c-4.143,0-7.5,3.357-7.5,7.5S113.357,120,117.5,120z"/>
                                <path d="M117.5,165H185c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5h-67.5c-4.143,0-7.5,3.357-7.5,7.5S113.357,165,117.5,165z"/>
                                <path d="M117.5,210H185c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5h-67.5c-4.143,0-7.5,3.357-7.5,7.5S113.357,210,117.5,210z"/>
                                <path d="M468.96,466.296c0.067-0.115,0.134-0.229,0.195-0.348c0.055-0.105,0.104-0.212,0.154-0.319   c0.052-0.114,0.104-0.228,0.15-0.344c0.046-0.115,0.087-0.231,0.127-0.349c0.039-0.113,0.077-0.226,0.11-0.341   c0.036-0.125,0.067-0.25,0.096-0.375c0.026-0.111,0.052-0.223,0.073-0.335c0.025-0.135,0.044-0.271,0.062-0.406   c0.014-0.107,0.029-0.213,0.038-0.321c0.013-0.146,0.018-0.292,0.022-0.437c0.002-0.074,0.011-0.146,0.011-0.221V176.958   c0-0.074-0.009-0.146-0.011-0.221c-0.004-0.146-0.009-0.291-0.022-0.437c-0.009-0.108-0.024-0.214-0.038-0.321   c-0.018-0.136-0.037-0.271-0.062-0.406c-0.021-0.113-0.047-0.224-0.073-0.335c-0.03-0.125-0.06-0.25-0.096-0.375   c-0.033-0.115-0.071-0.228-0.11-0.341c-0.04-0.117-0.081-0.233-0.127-0.349c-0.047-0.117-0.098-0.23-0.15-0.345   c-0.049-0.107-0.099-0.213-0.154-0.319c-0.061-0.118-0.128-0.233-0.195-0.348c-0.057-0.096-0.113-0.192-0.174-0.287   c-0.077-0.119-0.16-0.233-0.244-0.347c-0.045-0.063-0.084-0.127-0.132-0.188c-0.02-0.025-0.042-0.046-0.062-0.071   c-0.086-0.106-0.177-0.208-0.269-0.31c-0.077-0.086-0.152-0.174-0.232-0.255c-0.082-0.084-0.169-0.162-0.255-0.241   c-0.096-0.089-0.19-0.18-0.29-0.263c-0.078-0.065-0.16-0.124-0.241-0.185c-0.113-0.087-0.224-0.176-0.341-0.255   c-0.085-0.058-0.175-0.109-0.262-0.163c-0.116-0.073-0.231-0.148-0.351-0.213c-0.112-0.062-0.229-0.114-0.345-0.17   c-0.099-0.048-0.197-0.1-0.298-0.144c-0.138-0.06-0.281-0.109-0.423-0.16c-0.084-0.03-0.167-0.065-0.252-0.092   c-0.143-0.045-0.29-0.081-0.437-0.118c-0.09-0.023-0.179-0.05-0.27-0.069c-0.13-0.028-0.263-0.047-0.395-0.068   c-0.114-0.019-0.227-0.039-0.342-0.052c-0.112-0.013-0.225-0.018-0.338-0.025c-0.139-0.009-0.279-0.019-0.418-0.021   c-0.03,0-0.06-0.004-0.09-0.004H410V7.5c0-4.143-3.357-7.5-7.5-7.5h-335C63.357,0,60,3.357,60,7.5v161.958H7.5   c-0.029,0-0.056,0.004-0.085,0.004c-0.146,0.001-0.292,0.012-0.438,0.022c-0.107,0.007-0.214,0.012-0.32,0.024   c-0.122,0.014-0.243,0.036-0.364,0.055c-0.125,0.021-0.25,0.038-0.373,0.064c-0.1,0.021-0.198,0.051-0.298,0.077   c-0.137,0.035-0.275,0.068-0.409,0.111c-0.096,0.03-0.189,0.069-0.283,0.104c-0.131,0.048-0.264,0.093-0.392,0.148   c-0.113,0.048-0.222,0.106-0.333,0.16c-0.104,0.051-0.21,0.098-0.311,0.153c-0.128,0.07-0.252,0.151-0.377,0.229   c-0.079,0.05-0.16,0.095-0.237,0.147c-0.123,0.083-0.239,0.176-0.357,0.267c-0.075,0.058-0.153,0.113-0.225,0.173   c-0.102,0.085-0.198,0.178-0.297,0.27c-0.084,0.078-0.17,0.154-0.25,0.236c-0.08,0.082-0.156,0.17-0.233,0.256   c-0.091,0.102-0.182,0.203-0.268,0.309c-0.02,0.025-0.042,0.046-0.062,0.071c-0.048,0.061-0.087,0.126-0.132,0.188   c-0.084,0.114-0.167,0.228-0.244,0.347c-0.062,0.094-0.117,0.19-0.174,0.287c-0.067,0.115-0.134,0.229-0.195,0.348   c-0.055,0.106-0.105,0.212-0.154,0.32c-0.052,0.113-0.103,0.227-0.15,0.343c-0.046,0.116-0.088,0.232-0.128,0.349   c-0.039,0.113-0.077,0.226-0.11,0.341c-0.036,0.125-0.067,0.25-0.096,0.375c-0.026,0.111-0.052,0.223-0.073,0.335   c-0.025,0.135-0.044,0.271-0.062,0.406c-0.014,0.107-0.029,0.213-0.038,0.321c-0.013,0.146-0.018,0.292-0.022,0.437   C0.009,176.812,0,176.884,0,176.958V462.5c0,0.074,0.009,0.146,0.011,0.221c0.004,0.146,0.009,0.291,0.022,0.437   c0.009,0.108,0.024,0.214,0.038,0.321c0.018,0.136,0.037,0.271,0.062,0.406c0.021,0.113,0.047,0.224,0.073,0.335   c0.03,0.125,0.06,0.25,0.096,0.375c0.033,0.115,0.071,0.228,0.11,0.34c0.04,0.117,0.082,0.234,0.128,0.35   c0.046,0.116,0.097,0.229,0.149,0.342c0.05,0.107,0.099,0.214,0.154,0.32c0.062,0.119,0.128,0.233,0.195,0.348   c0.057,0.096,0.113,0.192,0.174,0.287c0.077,0.119,0.16,0.233,0.244,0.347c0.045,0.063,0.084,0.127,0.132,0.188   c0.018,0.022,0.038,0.041,0.056,0.063c0.141,0.177,0.291,0.346,0.448,0.509c0.033,0.035,0.064,0.074,0.098,0.108   c0.184,0.184,0.378,0.357,0.581,0.521c0.081,0.066,0.166,0.125,0.25,0.187c0.13,0.097,0.261,0.192,0.397,0.281   c0.093,0.06,0.187,0.115,0.281,0.171c0.138,0.081,0.279,0.159,0.422,0.231c0.091,0.046,0.183,0.09,0.275,0.133   c0.158,0.072,0.32,0.137,0.484,0.198c0.082,0.03,0.164,0.063,0.247,0.09c0.184,0.062,0.372,0.113,0.562,0.16   c0.068,0.017,0.135,0.037,0.204,0.052c0.212,0.046,0.429,0.081,0.648,0.108c0.05,0.006,0.098,0.018,0.148,0.023   C6.957,469.983,7.227,470,7.5,470h455c0.273,0,0.543-0.017,0.809-0.045c0.049-0.005,0.096-0.016,0.145-0.022   c0.22-0.028,0.438-0.063,0.652-0.109c0.067-0.015,0.132-0.035,0.198-0.051c0.192-0.047,0.383-0.1,0.569-0.162   c0.081-0.027,0.16-0.058,0.241-0.088c0.166-0.062,0.33-0.128,0.491-0.201c0.091-0.041,0.18-0.085,0.27-0.13   c0.146-0.074,0.288-0.152,0.428-0.235c0.093-0.055,0.186-0.109,0.277-0.168c0.138-0.09,0.27-0.186,0.402-0.285   c0.082-0.061,0.166-0.119,0.246-0.184c0.202-0.164,0.397-0.337,0.581-0.522c0.034-0.034,0.065-0.073,0.098-0.108   c0.157-0.163,0.307-0.332,0.448-0.509c0.018-0.022,0.038-0.041,0.056-0.063c0.048-0.061,0.087-0.126,0.132-0.188   c0.084-0.114,0.167-0.228,0.244-0.347C468.848,466.489,468.904,466.393,468.96,466.296z M387.583,394.44   c-3.263-2.549-7.977-1.973-10.528,1.292c-2.55,3.264-1.972,7.978,1.292,10.528L440.72,455H29.28l160.929-125.753l40.173,31.392   c1.357,1.06,2.987,1.59,4.618,1.59s3.261-0.53,4.618-1.59l40.173-31.392l74.917,58.542c1.371,1.071,2.998,1.59,4.613,1.59   c2.229,0,4.436-0.989,5.915-2.882c2.55-3.264,1.972-7.978-1.292-10.528l-71.972-56.24L455,192.337v254.783L387.583,394.44z    M15,192.337l163.027,127.391L15,447.121V192.337z M440.72,184.458L410,208.463v-24.005H440.72z M75,15h320v205.185L235,345.21   L75,220.185V15z M60,208.463l-30.72-24.005H60V208.463z"/>
                                <path d="M235,321.865c4.143,0,7.5-3.357,7.5-7.5V37.5c0-4.143-3.357-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v276.865   C227.5,318.508,230.857,321.865,235,321.865z"/>
                            </g>
                        </svg>
                            
                        <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Administrar notas</span></a>
                    </li>
                    <li class="nav-item border-bottom">
                        {{-- <a type="button" href="#exam-grade-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('exams*')? 'active' : '' }}"><i class="bi bi-file-text"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Calificaciones</span>
                            <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                        </a> --}}
                        <ul class="nav collapse {{ request()->is('exams*')? 'show' : 'hide' }} bg-white" id="exam-grade-submenu">
                            <!-- <li class="nav-item w-100" {{ request()->routeIs('exam.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.list.show')}}"><i class="bi bi-file-text me-2"></i> View Exams</a></li>
                            @if (Auth::user()->role == "admin" || Auth::user()->role == "teacher")
                            <li class="nav-item w-100" {{ request()->routeIs('exam.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.create.show')}}"><i class="bi bi-file-plus me-2"></i> Create Exams</a></li>
                            @endif -->
                            @if (Auth::user()->role == "admin")
                            <li class="nav-item w-100" {{ request()->routeIs('exam.grade.system.create')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.grade.system.create')}}"><i class="bi bi-file-plus me-2"></i> Add Grade Systems</a></li>
                            @endif
                            <li class="nav-item w-100" {{ request()->routeIs('exam.grade.system.index')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.grade.system.index')}}"><i class="bi bi-file-ruled me-2"></i> Ver calificaciones</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item border-bottom">
                        <a type="button" href="#" class="d-flex nav-link {{ request()->is('marks*')? 'active' : '' }} dropdown-toggle caret-off" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-cloud-sun"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Marks / Results</span>
                            <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{url('marks/view')}}">View Marks</a></li>
                            <li><a class="dropdown-item" href="{{url('marks/results')}}">View Results</a></li>
                        </ul>
                    </li> --}}
                    @endif
                    <!-- @if (Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('notice*')? 'active' : '' }}" href="{{route('notice.create')}}"><i class="bi bi-megaphone"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Avisos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('calendar-event*')? 'active' : '' }}" href="{{route('events.show')}}"><i class="bi bi-calendar-event"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Eventos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('syllabus*')? 'active' : '' }}" href="{{route('class.syllabus.create')}}"><i class="bi bi-journal-text"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Plan de estudio</span></a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link {{ request()->is('routine*')? 'active' : '' }}" href="{{route('section.routine.create')}}"><i class="bi bi-calendar4-range"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Rutinas</span></a>
                    </li>
                    @endif -->
                    @if (Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('academics*')? 'active' : '' }}" href="{{url('academics/settings')}}"><i class="bi bi-tools"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Año académico</span></a>
                    </li>
                    @endif
                    <!-- @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('promotions*')? 'active' : '' }}" href="{{url('promotions/index')}}"><i class="bi bi-sort-numeric-up-alt"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Promotion</span></a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><i class="bi bi-currency-exchange"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Payment</span></a>
                    </li>
                    @if (Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><i class="bi bi-person-lines-fill"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Staff</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><i class="bi bi-journals"></i> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Library</span></a>
                    </li>
                    @endif -->
                </ul>
            </div>
        </div>
