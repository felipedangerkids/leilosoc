<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>LEILOSOC</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
                <p>Dashboard</p>
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cadastros</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{ route('painel.departamento') }}">Departamentos</a>
                        </li>
                        <li>
                            <a href="{{ route('painel.users') }}">Colaboradores</a>
                        </li>
                        <li>
                            <a href="#">Escritório</a>
                        </li>
                        <li>
                            <a href="#">Mensagem Todos</a>
                        </li>

                    </ul>
<<<<<<< Updated upstream
                    <a href="#citrus" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Citrus</a>
                    <ul class="collapse list-unstyled" id="citrus">
                        <li>
                            <a href="{{ route('citrus') }}">Cadastros</a>
                        </li>

                    </ul>
                </li>
=======
>>>>>>> Stashed changes

                    <a href="#homeSubmenu_1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tarefas</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu_1">
                        <li>
                            <a href="{{ route('painel.tarefa') }}">Todas tarefa</a>
                        </li>
                        <li>
                            <a href="#">Abrir tarefas</a>
                        </li>
                    </ul>

                    <a href="#homeSubmenu_2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Citus</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu_2">
                        <li>
                            <a href="#">Buscar</a>
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
                    <a href="#homeSubmenu_3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Assets</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu_3">
                        <li>
                            <a href="#">Buscar</a>
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
                    <a href="#homeSubmenu_4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Despesas</a>
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>
