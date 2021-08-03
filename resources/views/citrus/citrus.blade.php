@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block"><h3 class="card-title"><b>Processos</b></h3></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1 ml-auto">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="buscar">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
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
                                            <tr>
                                                <th scope="col">Tribunal</th>
                                                <th scope="col">Ato</th>
                                                <th scope="col">Referência</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Acão</th>
                                            </tr>
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
                                                        {{-- <div>
                                                            <a href="{{ route('painel.tarefas', $dado->id) }}"><button class="btn btn-dark mx-1">Abrir Tarefa</button></a>
                                                        </div> --}}
                                                        <div>
                                                            <a href="{{ $dado->document }}" class="btn btn-primary mx-1 text-nowrap" target="_blank"><i class="fas fa-eye"></i> Documento</a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('citrus.show', $dado->id) }}" class="btn btn-primary mx-1 text-nowrap"><i class="fas fa-eye"></i> Ver</a>
                                                        </div>
                                                        <div>
                                                        <a href="{{ route('citrus.delete', $dado->id) }}" onclick="return confirm('Você tem certeza que deseja deletar isso?');" class="btn btn-danger mx-1 text-nowrap"><i class="fas fa-trash"></i> Excluir</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $dados->links()  }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
