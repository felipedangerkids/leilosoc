@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="my-2">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Criar
                Departamento</button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Departamento</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($departamentos as $departamento)
                <tr>
                    <th scope="row">{{ $departamento->id }}</th>
                    <td>{{ $departamento->name }}</td>
        <header>
            <div class="d-flex">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex">
                            <input class="form-control ml-5 " type="search" placeholder="Pesquisar" aria-label="Search">
                            <button class="btn btn-pesquisar " type="submit"><img src="{{ url('login/img/lupa.png') }}" alt=""></button>
                        </form>
                        <div class="icones-1 d-flex">
                            <div class="notificacao ml-3">
                                <div>
                                    <a href="">
                                        <img src="{{ url('login/img/mail.png') }}" alt="">
                                    </a>                                  
                                </div>
                                <div>
                                    <a href="">
                                        <img src="{{ url('login/img/bell.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="user ml-3">
                                <a href="">
                                    <img src="login/img/user.png" alt="">
                                </a>
                            </div>
                            <div class="info ml-3">
                                <div class="name-user">
                                    <span>Rute</span>
                                </div>
                                <div class="conta-info">
                                    <span>Admin account</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

                </tr>

                @endforeach


            </tbody>
        </table>



    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('painel.departamento.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Nome do Departamento</label>
                              <input type="text" name="name"  class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
