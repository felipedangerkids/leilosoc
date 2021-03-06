@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block"><h3 class="card-title"><b>Modelos</b></h3></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i> Novo Modelo</button></div>
                                <div class="col-12 col-sm-6 col-md-6 my-1 ml-auto">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="search" name="name" class="form-control" value="@isset($_GET['name']){{$_GET['name']}}@endisset" placeholder="buscar">
                                            <select name="coluna" class="form-control">
                                                <option value="name" @isset($_GET['coluna']) @if($_GET['coluna'] == 'name') selected @endif @endisset>Nome</option>
                                                <option value="departamento" @isset($_GET['coluna']) @if($_GET['coluna'] == 'departamento') selected @endif @endisset>Departamento</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Modelo</th>
                                            <th scope="col">Departamento</th>
                                            <th scope="col">A????es</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($modelos as $modelo)
                                            <tr>
                                                <th scope="row">{{ $modelo->id }}</th>
                                                <td>{{ $modelo->name }}</td>
                                                <td>{{ $modelo->departamento->name ?? ''}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{route('modelos.edit', $modelo->id)}}" class="btn btn-primary mx-1"><i class="fas fa-edit"></i> Editar</a>
                                                        </div>
                                                        <div>
                                                            <a href="{{route('modelos.delete', $modelo->id)}}" onclick="return confirm('Voc?? tem certeza que deseja deletar isso?');" class="btn btn-danger mx-1"><i class="fas fa-trash"></i>  Excluir</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @if (isset($_GET['name']))
                                {{ $modelos->appends(['name' => $_GET['name'], 'coluna' => $_GET['coluna']])->links()  }}
                            @else
                                {{ $modelos->links()  }}
                            @endif
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
                    <h5 class="modal-title" id="staticBackdropLabel">Novo modelo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('modelos.post') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label">Nome do Modelo</label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="categoria_id">Departamento</label>
                            <select class="form-control" name="categoria_id" id="categoria_id">
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
