@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Filtros</b></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pad">
                            <div class="container">
                                <form action="{{route('citrus')}}">
                                    {{-- Campos --}}
                                    <div class="row">
                                        {{-- Filtro - Data Inicial & Final --}}
                                        <div class="form-group col-12 col-md-4">
                                            <label for="start_end_date">Data Inicial e Final</label>
                                            <input type="text" class="form-control form-control-sm date-mask" name="start_end_date" value="@if (isset($_GET['start_end_date'])){{$_GET['start_end_date']}}@else{{date('d/m/Y')}} - {{date('d/m/Y')}}@endif">
                                        </div>
                                    </div>
                                    {{-- Botões --}}
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i> Filtrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h3 class="card-title"><b>Processos</b></h3>
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
                                                            <a href="{{ asset('storage/'.$dado->document) }}" class="btn btn-primary mx-1 text-nowrap" target="_blank"><i class="fas fa-eye"></i> Documento</a>
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

                            @if (isset($_GET['start_end_date']))
                                {{ $dados->appends(['start_end_date' => $_GET['start_end_date']])->links()  }}
                            @else
                                {{ $dados->links()  }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
