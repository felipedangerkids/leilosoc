@extends('layouts.painel')

@section('content')
    <div class="container">
        <div class="my-2">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Criar
                Usuário</button>
        </div>
        <table class="table">
            <thead class="thead-dark">
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
                        {{ $user->departamento->name ?? 'Departamento Excluido' }}
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <div>
                                <a href="{{ route('painel.users.edit', $user->id) }}"><button class="btn btn-primary mx-1">Editar</button></a>
                            </div>
                            <div>
                              <a href="{{ route('painel.users.delete', $user->id) }}" onclick="return confirm('Você tem certeza que deseja deletar isso?');"> <button class="btn btn-danger mx-1">Excluir</button></a>
                            </div>
                        </div>
                    </td>
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
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Senha</label>
                            <input type="password" name="password" class="form-control">
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
