@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="d-flex">
            <div class="my-2">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Criar
                    Novo Escritório</button>
            </div>

        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Escritorio</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($escritorios as $escritorio)
                    <tr>
                        <th scope="row">{{ $escritorio->id }}</th>
                        <td>{{ $escritorio->name }}</td>
                       
                        <td>
                            <div class="d-flex">
                                <div>
                                    <a href=""><button class="btn btn-primary mx-1">Editar</button></a>
                                </div>
                                <div>
                                    <a href="" onclick="return confirm('Você tem certeza que deseja deletar isso?');">
                                        <button class="btn btn-danger mx-1">Excluir</button></a>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Novo insolvente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('escritorio.post') }}" method="POST">
                        @csrf

                        <div class="col-md-12 mt-3">
                            <label for="inputEmail4" class="form-label">Local</label>
                            <input name="name" type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="botoes my-5 ">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                        <div class="modal-footer col-md-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
