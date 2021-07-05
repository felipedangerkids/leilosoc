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
                    <th scope="col">Ação</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($departamentos as $departamento)
                <tr>
                    <th scope="row">{{ $departamento->id }}</th>
                    <td>{{ $departamento->name }}</td>
                    <td>
                        <div class="d-flex">
                            <div>
                                <a href="{{ route('painel.departamento.edit', $departamento->id) }}"><button class="btn btn-primary mx-1">Editar</button></a>
                            </div>
                            <div>
                              <a href="{{ route('painel.departamento.delete', $departamento->id) }}" onclick="return confirm('Você tem certeza que deseja deletar isso?');"> <button class="btn btn-danger mx-1">Excluir</button></a>
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
