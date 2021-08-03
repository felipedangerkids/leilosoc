@extends('layouts.painel')

@section('content')

    <div class="container">
        <div class="d-flex">
            <div class="my-2">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Criar
                    Novo modelo</button>
            </div>
            <div class="my-2 mx-3">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#categoria">Criar
                    Nova Categoria</button>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($modelos as $modelo)
                    <tr>
                        <th scope="row">{{ $modelo->id }}</th>
                        <td>{{ $modelo->name }}</td>
                        <td>{{ $modelo->categoria->name }}</td>
                        <td>
                            <div class="d-flex">
                                <div>
                                    <a href=""><button
                                            class="btn btn-primary mx-1">Editar</button></a>
                                </div>
                                <div>
                                    <a href=""
                                        onclick="return confirm('Você tem certeza que deseja deletar isso?');"> <button
                                            class="btn btn-danger mx-1">Excluir</button></a>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Novo modelo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('modelos.post') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect1">Categoria do modelo</label>
                            <select class="form-control" name="categoria_id" id="exampleFormControlSelect1">
                                @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                @endforeach

                            </select>
                          </div>
                          <div class="col-md-12 mt-3">
                            <label for="inputEmail4" class="form-label">Nome da Categoria</label>
                            <input name="name" type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="botoes my-5 ">
                            <button type="submit" class="btn btn-success">ABRIR modelo</button>
                        </div>
                        <div class="modal-footer col-md-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="categoria" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nova categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('modelos.cat.post') }}" method="POST">
                    @csrf
                    <div class="col-md-12 mt-3">
                        <label for="inputEmail4" class="form-label">Nome da Categoria</label>
                        <input name="name" type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="botoes my-5 ">
                        <button type="submit" class="btn btn-success">ABRIR categoria</button>
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
