<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LEILOSOC</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    {{-- fullcalendar --}}
    <link href='{{ url('tarefa/fullcalendar/packages/core/main.css') }}' rel='stylesheet' />
    <link href='{{ url('tarefa/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
    <link href='{{ url('tarefa/fullcalendar/packages/timegrid/main.css') }}' rel='stylesheet' />
    <link href='{{ url('tarefa/fullcalendar/packages/list/main.css') }}' rel='stylesheet' />
    <link rel="stylesheet" href="{{ url('tarefa/fullcalendar/css/style.min.css') }}">


    <!-- Links CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('painel/css/main.min.css') }}">
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img width="200" src="{{ url('login/img/logo.png') }}" alt="">
            </div>
            <ul class="list-unstyled components">
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Cadastros</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{ route('painel.departamento') }}">Departamentos</a>
                        </li>
                        <li>
                            <a href="{{ route('painel.users') }}">Colaboradores</a>
                        </li>
                        <li>
                            <a href="{{ route('insolventes') }}">Administrador de Insolvencias</a>
                        </li>
                        <li>
                            <a href="#">Escritório</a>
                        </li>
                        <li>
                            <a href="#">Mensagem Todos</a>
                        </li>
                    </ul>

                    <a href="#homeSubmenu_1" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Tarefas</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu_1">
                        <li>
                            <a href="{{ route('painel.tarefas') }}">Todas tarefas</a>
                        </li>
                        <li>
                            <a href="#">Abrir tarefas</a>
                        </li>
                        <li>
                            <a href="{{ route('modelos') }}">Modelos</a>
                        </li>
                    </ul>

                    <a href="#citrus" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Citius</a>
                    <ul class="collapse list-unstyled" id="citrus">
                        <li>
                            <a href="{{ route('citrus') }}">Cadastros</a>
                        </li>
                        <li>
                            <a href="#">Tipo de processos</a>
                        </li>
                        <li>
                            <a href="#">ADM Judicial</a>
                        </li>
                        <li>
                            <a href="#">Consultores</a>
                        </li>

                    </ul>
                    <a href="#homeSubmenu_3" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Assets</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu_3">
                        <li>
                            <a href="{{ route('assets') }}">Buscar</a>
                        </li>
                        <li>
                            <a href="#">Tipo de processos</a>
                        </li>
                        <li>
                            <a href="#">ADM Judicial</a>
                        </li>
                        <li>
                            <a href="#">Consultores</a>
                        </li>

                    </ul>
                    <a href="#homeSubmenu_4" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Despesas</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu_4">
                        <li>
                            <a href="#">Cadastrar</a>
                        </li>
                        <li>
                            <a href="#">Todas as despesas</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <!-- Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ url('tarefa/datepicker/js/script.js') }}"></script>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
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
    <script>

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
