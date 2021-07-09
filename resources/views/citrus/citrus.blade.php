@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="my-2">
           <a href="{{ route('citrus.create') }}"> <button type="button" class="btn btn-dark">Inserir Novo</button></a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Tribunal</th>
                    <th scope="col">Ato</th>
                    <th scope="col">Referência</th>
                    <th scope="col">Data</th>
                    <th scope="col">Acão</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados->reverse() as $dado)
                <tr>
                    <th scope="row">{{ $dado->tribunal }}</th>
                    <td>{{ $dado->ato }}</td>
                    <td>{{ $dado->referencia }}</td>
                    <td>{{ $dado->data }}</td>
                    <td>
                        <div class="d-flex">
                            <div>
                                <a href="#"><button class="btn btn-dark mx-1">Abrir Tarefa</button></a>
                            </div>
                            <div>
                                <a href="{{ route('citrus.show', $dado->id) }}"><button class="btn btn-primary mx-1">Ver</button></a>
                            </div>
                            <div>
                              <a href="#" onclick="return confirm('Você tem certeza que deseja deletar isso?');"> <button class="btn btn-danger mx-1">Excluir</button></a>
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
