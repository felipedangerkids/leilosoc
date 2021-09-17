@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block"><h3 class="card-title"><b>Tipos de Processos</b></h3></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#novoTipoProcesso"><i class="fas fa-plus"></i> Novo Tipo de Processo</button></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1 ml-auto">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="search" name="name" class="form-control" value="@isset($_GET['name']){{$_GET['name']}}@endisset" placeholder="buscar">
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
                                            <th scope="col">Tipo de Processo</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tiposProcessos as $tipoProcesso)
                                            <tr>
                                                <th scope="row">{{ $tipoProcesso->id }}</th>
                                                <td>{{ $tipoProcesso->name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{route('tipo_processo.edit', $tipoProcesso->id)}}"><button class="btn btn-primary mx-1"><i class="fas fa-edit"></i> Editar</button></a>
                                                        </div>
                                                        <div>
                                                            <a href="{{route('tipo_processo.destroy', $tipoProcesso->id)}}" onclick="return confirm('Você tem certeza que deseja deletar isso?');" class="btn btn-danger mx-1"><i class="fas fa-trash"></i> Excluir</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if (isset($_GET['name']))
                                {{ $tiposProcessos->appends(['name' => $_GET['name']])->links()  }}
                            @else
                                {{ $tiposProcessos->links()  }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="novoTipoProcesso" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="novoTipoProcessoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novoTipoProcessoLabel">Novo Tipo de Processo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tipo_processo') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label">Nome do Tipo de Processo</label>
                            <input name="name" type="text" class="form-control">
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
