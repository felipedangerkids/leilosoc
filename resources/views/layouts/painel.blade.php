<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LEILOSOC</title>

        <!-- Fontes -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('plugin/bootstrap-4.6.0/css/bootstrap.min.css')}}">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{asset('plugin/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugin/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{asset('plugin/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <!-- DateRangerPicker -->
        <link rel="stylesheet" href="{{asset('plugin/daterangepicker/daterangepicker.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('plugin/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        {{-- Colopicker --}}
        <link rel="stylesheet" href="{{asset('plugin/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('plugin/AdminLTE/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('plugin/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('plugin/summernote/summernote-bs4.min.css')}}">

        {{-- fullcalendar --}}
        <link href='{{ url('tarefa/fullcalendar/packages/core/main.css') }}' rel='stylesheet' />
        <link href='{{ url('tarefa/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
        <link href='{{ url('tarefa/fullcalendar/packages/timegrid/main.css') }}' rel='stylesheet' />
        <link href='{{ url('tarefa/fullcalendar/packages/list/main.css') }}' rel='stylesheet' />

        <link rel="stylesheet" href="{{asset('painel/css/main.min.css')}}">

        <style>
            select[readonly].select2-hidden-accessible + .select2-container {
                pointer-events: none;
                touch-action: none;
            }

            select[readonly].select2-hidden-accessible + .select2-container .select2-selection {
                background: #eee;
                box-shadow: none;
            }

            select[readonly].select2-hidden-accessible + .select2-container .select2-selection__arrow, select[readonly].select2-hidden-accessible + .select2-container .select2-selection__clear {
                display: none;
            }
        </style>
    </head>
    <body class="sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{asset('/')}}" class="brand-link">
                    <img src="{{asset('login/img/logo.png')}}" alt="LeiloSoc Logo" class="brand-image-logo" style="opacity: .8">
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <span class="img-circle elevation-2" id="image_perfil" alt="User Image"> </span>
                        </div>
                        <div class="info mt-auto">
                            <span class="d-block" id="user_name">{{auth()->user()->name}}</span>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{asset('/')}}" class="nav-link @if(Request::is('/')) active @endif">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item @if(Request::is('cadastro/*')) menu-open @endif">
                                <a href="#" class="nav-link @if(Request::is('cadastro/*')) active @endif">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Cadastros <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('painel.departamento')}}" class="nav-link @if(Request::is('cadastro/departamentos')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Departamentos</p>
                                        </a>
                                        <a href="{{route('painel.users')}}" class="nav-link @if(Request::is('cadastro/users')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Colaboradores</p>
                                        </a>
                                        <a href="{{route('insolventes')}}" class="nav-link @if(Request::is('cadastro/insolventes')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Administrador</p>
                                        </a>
                                        <a href="{{route('escritorio')}}" class="nav-link @if(Request::is('cadastro/escritorio')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Escritório</p>
                                        </a>
                                        <a href="{{route('modelos')}}" class="nav-link @if(Request::is('cadastro/modelos')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Modelos</p>
                                        </a>
                                        <a href="#" class="nav-link @if(Request::is('cadastro/mensagens')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Mensagem Todos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if(Request::is('tarefa/*')) menu-open @endif">
                                <a href="#" class="nav-link @if(Request::is('tarefa/*')) active @endif">
                                    <i class="nav-icon fas fa-calendar-check"></i>
                                    <p>Tarefas <i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('painel.tarefas')}}" class="nav-link @if(Request::is('tarefa/tarefas') || Request::is('tarefa/tarefas/*')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Todas Tarefas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if(Request::is('citius/*')) menu-open @endif">
                                <a href="#" class="nav-link @if(Request::is('citius/*')) active @endif">
                                    <i class="nav-icon fas fa-sync"></i>
                                    <p>Citius <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('citrus')}}" class="nav-link @if(Request::is('citius/processos') || Request::is('citius/processos/*')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Processos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if(Request::is('calendario/*')) menu-open @endif">
                                <a href="#" class="nav-link @if(Request::is('calendario/*')) active @endif">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>Calendario <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('leilao')}}" class="nav-link @if(Request::is('calendario/leilao') || Request::is('calendario/leilao/*')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Todos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if(Request::is('assets/*')) menu-open @endif">
                                <a href="#" class="nav-link @if(Request::is('assets/*')) active @endif">
                                    <i class="nav-icon fas fa-camera"></i>
                                    <p>Assets <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('assets')}}" class="nav-link @if(Request::is('assets/assets') || Request::is('assets/assets/*')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Deslocações</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if(Request::is('depesas/*')) menu-open @endif">
                                <a href="#" class="nav-link @if(Request::is('depesas/*')) active @endif">
                                    <i class="nav-icon fas fa-euro-sign"></i>
                                    <p>Despesas <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link @if(Request::is('depesas/depesas')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Todas as Despesas</p>
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

            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <!-- jQuery -->
        <script src="{{asset('plugin/jquery-3.6.0.min.js')}}"></script>
        <!-- MaskJquery -->
        <script src="{{asset('plugin/mask.jquery.js')}}"></script>
        <!-- ValidaCnpjCpf -->
        <script src="{{asset('plugin/valida_cpf_cnpj.js')}}"></script>
        <!-- bootstrap-4.6.0 -->
        <script src="{{asset('plugin/bootstrap-4.6.0/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('plugin/select2/js/select2.full.min.js')}}"></script>
        <!-- SweetAlert2 -->
        <script src="{{asset('plugin/sweetalert2/sweetalert2.min.js')}}"></script>
        <!-- Moment -->
        <script src="{{asset('plugin/moment/moment.min.js')}}"></script>
        <!-- Colorpicker -->
        <script src="{{asset('plugin/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <!-- DateRangerPicker -->
        <script src="{{asset('plugin/daterangepicker/daterangepicker.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('plugin/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('plugin/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('plugin/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('plugin/AdminLTE/js/adminlte.min.js')}}"></script>

        {{-- fullcalendar --}}
        <script src='{{ url('tarefa/fullcalendar/packages/core/main.js') }}'></script>
        <script src='{{ url('tarefa/fullcalendar/packages/interaction/main.js') }}'></script>
        <script src='{{ url('tarefa/fullcalendar/packages/daygrid/main.js') }}'></script>
        <script src='{{ url('tarefa/fullcalendar/packages/timegrid/main.js') }}/'></script>
        <script src='{{ url('tarefa/fullcalendar/packages/list/main.js') }}'></script>
        <script src='{{ url('tarefa/fullcalendar/packages/core/locales/pt-br.js') }}'></script>

        <script src="{{ url('tarefa/fullcalendar/js/scripts.js') }}"></script>
        {{-- Outros --}}
        <script src="{{ url('tarefa/js/script.js') }}"></script>

        <script src="{{ url('painel/js/script.js') }}"></script>

        @if (Session::has('success'))
            <script type="text/javascript">
                Swal.fire({
                    icon: 'success',
                    title: 'Muito bom!',
                    text: "{{ Session::get('success') }}",

                }).then((value) => {
                    location.reload();
                }).catch(swal.noop);
            </script>
        @endif
        <script type="text/javascript">
            $('#buscar').on('click', function() {
                $value = $('#cep').val();
                $.ajax({
                    type: 'get',
                    url: '{{ url('cep') }}',
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        console.log(data);
                        $('#morada').val(data.Morada);
                        $('#regiao').val(data.Localidade);
                        $('#distrito').val(data.Distrito);
                        $('#conselho').val(data.Concelho);
                        $('#freguesia').val(data.Freguesia);
                        $('#latitude').val(data.Latitude);
                        $('#longitude').val(data.Longitude);
                    }
                });
            })
        </script>
        <style>
            .fc-header-toolbar {
            /*
            the calendar will be butting up against the edges,
            but let's scoot in the header's buttons
            */
            padding-top: 0em;
            padding-left: 0em;
            padding-right: 0em;
            }

        </style>
        <script>
            $('.open').on('click', function(){
                var idprod = $(this).data('id');
                $('[name="idasset"]').val(idprod);
            });
        </script>
    </body>
</html>