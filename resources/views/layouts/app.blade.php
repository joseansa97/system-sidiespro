<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIDIESPRO</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('dist/css/fonts.css') }}" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    @yield('scripts')

    <!-- InputMask 
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    -->

    <!-- Datatables 
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    -->
   

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item active">
                        <div class="image">
                            <a href="#" class="brand-link">
                                <img src="{{asset('dist/img/logotectlaxiaco.png')}}" alt="Logo" width="30px" height="30px" class="brand-image img-circle">
                            </a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><b>DIVISIÓN DE ESTUDIOS PROFESIONALES</b></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/home') }}" class="brand-link">
                    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">SISTEMA TEC</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('dist/img/logotectlaxiaco.png')}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                @else
                                <b>{{ Auth::user()->name }}</b>
                                
                                <a style="color: white; background: #343a40;" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item">
                                <a href="/home" class="{{ Request::path() === '/home' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>

                            <?php use App\User; $users_count = User::all()->count(); ?>
                        @role('Administrador|Normal')
                            <li class="nav-item">
                                <a href="{{ url('usuarios') }}"
                                    class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                    
                                        Usuarios
                                    
                                        
                                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                    
                                    </p>
                                </a>
                            </li>
                        @endrole    
                        
                        @role('Administrador|Normal')
                            <li class="nav-item">
                                <a href="{{ url('coordinadores') }}"
                                    class="{{ Request::path() === 'coordinadores' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Coordinadores
                                    </p>
                                </a>
                            </li>
                        @endrole

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Carreras<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('estudiantes') }}"
                                            class="{{ Request::path() === 'estudiantes' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>General</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        
                                        <a href="{{ url('estudiantes') }}?search=1"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lic. Administración</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('estudiantes') }}?search=2"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ing. Civil</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('estudiantes') }}?search=3"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ing. Gestion E.</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('estudiantes') }}?search=4"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ing. Industrial</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('estudiantes') }}?search=5"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ing. Mecatronica</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('estudiantes') }}?search=6"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ing. Sistemas C.</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="padding-top: 35px; padding-bottom: 50px;">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->
                <!-- Main content -->
                <section class="content">
                    @yield('content')

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->


            <footer class="main-footer fixed-bottom">
                <!-- NO QUITAR -->
                <b> INSTITUTO TECNOLÓGICO DE TLAXIACO </b>
                <div class="float-right d-none d-sm-inline-block">
                    <b>TECNOLÓGICO NACIONAL DE MEXICO</b>
                </div>
            </footer>


            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>
    </div>

</body>

</html>