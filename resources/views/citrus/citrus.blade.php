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
                                <form action="" method="get">
                                    {{-- Campos --}}
                                    <div class="row">
                                        <div class="form-group col-6 col-md-2">
                                            <label for="data_inicial">Data Inicial</label>
                                            <input type="text" class="form-control form-control-sm date-mask" name="data_inicial" value="@isset($_GET['data_inicial']){{$_GET['data_inicial']}}@else{{date('d/m/Y')}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-2">
                                            <label for="data_final">Data Final</label>
                                            <input type="text" class="form-control form-control-sm date-mask" name="data_final" value="@isset($_GET['data_final']){{$_GET['data_final']}}@else{{date('d/m/Y')}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-2">
                                            <label for="ato">Ato</label>
                                            <input type="text" class="form-control form-control-sm" name="ato" value="@isset($_GET['ato']){{$_GET['ato']}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-3">
                                            <label for="tribunal">Triutal</label>
                                            <input type="text" class="form-control form-control-sm" name="tribunal" value="@isset($_GET['tribunal']){{$_GET['tribunal']}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-3">
                                            <label for="referencia">Refer??ncia</label>
                                            <input type="text" class="form-control form-control-sm" name="referencia" value="@isset($_GET['referencia']){{$_GET['referencia']}}@endisset">
                                        </div>
                                    </div>
                                    {{-- Bot??es --}}
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

                <div class="col-12 mt-1">
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
                                                <th scope="col">Refer??ncia</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Ac??o</th>
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
                                                        @if (Request::is('processo/*'))
                                                            <div>
                                                                <a href="{{ route('processo.liberado.ver', $dado->id) }}" class="btn btn-primary mx-1 text-nowrap"><i class="fas fa-eye"></i> Ver</a>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <a href="{{ route('citrus.show', $dado->id) }}" class="btn btn-primary mx-1 text-nowrap"><i class="fas fa-eye"></i> Ver</a>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <a href="{{ route('citrus.delete', $dado->id) }}" onclick="return confirm('Voc?? tem certeza que deseja deletar isso?');" class="btn btn-danger mx-1 text-nowrap"><i class="fas fa-trash"></i> Excluir</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $dados->appends([
                                'data_inicial'  => (isset($_GET['data_inicial']) ? $_GET['data_inicial'] : ''),
                                'data_final'    => (isset($_GET['data_final']) ? $_GET['data_final'] : ''),
                                'tribunal'      => (isset($_GET['tribunal']) ? $_GET['tribunal'] : ''),
                                'ato'           => (isset($_GET['ato']) ? $_GET['ato'] : ''),
                                'referencia'    => (isset($_GET['referencia']) ? $_GET['referencia'] : ''),
                            ])->links()  }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
