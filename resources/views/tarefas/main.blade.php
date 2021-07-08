@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="my-2">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Criar
                Nova Tarefa</button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome da Tarefa</th>
                    <th scope="col">Data de conclusão</th>
                    <th scope="col">Projetos</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                <tr>
                    <th scope="row">{{ $tarefa->id }}</th>
                    <td>{{ $tarefa->name }}</td>
                    <td>{{ $tarefa->data }}</td>
                    <td>{{ $tarefa->projeto }}</td>
                    <td>
                        <div class="d-flex">
                            <div>
                                <a href="{{ route('painel.tarefa.edit', $tarefa->id) }}"><button class="btn btn-primary mx-1">Editar</button></a>
                            </div>
                            <div>
                              <a href="{{ route('painel.tarefa.delete', $tarefa->id) }}" onclick="return confirm('Você tem certeza que deseja deletar isso?');"> <button class="btn btn-danger mx-1">Excluir</button></a>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Criar nova tarefa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('painel.tarefa.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Nome da Tarefa</label>
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
