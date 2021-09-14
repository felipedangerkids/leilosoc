@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block">
                                    <h3 class="card-title"><b>Usuarios</b></h3>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 my-1"><button type="button" class="btn btn-dark"
                                        data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i>
                                        Novo Usuario</button></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1 ml-auto">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="buscar">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-dark"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Departamento</th>
                                            <th scope="col">Acão</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->departamento_id == null)
                                                        Admin

                                                    @else
                                                        {{ $user->departamento->name ?? 'Departamento Excluido' }} <span
                                                            style="background-color:{{ $user->departamento->color ?? 'white' }}; padding: 8px; margin: 0 5px"></span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{ route('painel.users.edit', $user->id) }}"><button
                                                                    class="btn btn-primary mx-1"><i
                                                                        class="fas fa-edit"></i> Editar</button></a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('painel.users.delete', $user->id) }}"
                                                                onclick="return confirm('Você tem certeza que deseja deletar isso?');">
                                                                <button class="btn btn-danger mx-1"><i
                                                                        class="fas fa-trash"></i> Excluir</button></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('painel.users.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Departamento</label>
                            <select class="form-control" name="departamento_id" id="exampleFormControlSelect1">
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Escritório</label>
                            <select class="form-control" name="escritorio_id" id="exampleFormControlSelect1">
                                @foreach ($escritorios as $escritorio)
                                    <option value="{{ $escritorio->id }}">{{ $escritorio->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Digite um Nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="Digite um Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Senha</label>
                            <input type="password" name="password" class="form-control" placeholder="Digite uma Senha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Digite um Nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Permissão</label>
                            <select class="form-control" name="permission" id="permissãoexampleFormControlSelect1">
                                <option value="admin">Admin</option>
                                <option value="user">Usuário</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
                            Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
