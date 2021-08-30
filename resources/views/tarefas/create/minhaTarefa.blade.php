@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block"><h3 class="card-title"><b>Tarefas</b></h3></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1"><a href="{{ route('tarefa.calendario') }}" class="btn  btn-dark mx-1"><i class="fas fa-calendar"></i> Agenda de Tarefas</a></div>
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
                                            <th scope="col">Numero da Tarefa</th>
                                            <th scope="col">Data de Conclusão</th>
                                            <th scope="col">Modelo</th>
                                            <th scope="col">Responsáveis</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tarefas as $tarefa)
                                            @php
                                                $count = 0;
                                                foreach($tarefa->alocados as $alocado){
                                                    if($alocado->id == auth()->user()->id){
                                                        $count++;
                                                    }
                                                }
                                                if($count == 0) continue;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $tarefa->numero_processo }}</th>
                                                <td>{{ date('d/m/Y', strtotime(str_replace('-', '/', $tarefa->fim))) }}</td>
                                                <td>{{ $tarefa->modelo }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$tarefa->alocados->count()}} - Responsáveis</button>
                                                        <div class="dropdown-menu">
                                                            @foreach ($tarefa->alocados as $alocado)
                                                                <button type="button" class="dropdown-item">{{$alocado->name}}</button>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><button type="button" class="btn btn-{{$tarefa->status == 'I' ? 'info' : 'danger'}}">{{$tarefa->status == 'I' ? 'Iniciada' : 'Pausada'}}</button></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="btn-custom mx-2">
                                                            <i class="fas fa-eye"></i>
                                                        </div>

                                                        <div class="btn-custom mx-2">
                                                            <i class="fas fa-trash"></i>
                                                        </div>
                                                        <div class="btn-custom mx-2">
                                                            <i class="fas fa-play"></i>
                                                        </div>
                                                        <div class="btn-custom mx-2">
                                                            <i class="fas fa-pause"></i>
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
@endsection
