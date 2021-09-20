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
                                            <label for="data_entrada_inicial">Data Entrada Inicial</label>
                                            <input type="text" class="form-control form-control-sm date-mask" name="data_entrada_inicial" value="@isset($_GET['data_entrada_inicial']){{$_GET['data_entrada_inicial']}}@else{{date('d/m/Y')}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-2">
                                            <label for="data_entrada_final">Data Entrada Final</label>
                                            <input type="text" class="form-control form-control-sm date-mask" name="data_entrada_final" value="@isset($_GET['data_entrada_final']){{$_GET['data_entrada_final']}}@else{{date('d/m/Y')}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-2">
                                            <label for="numero_processo">Nº Processo</label>
                                            <input type="text" class="form-control form-control-sm" name="numero_processo" value="@isset($_GET['numero_processo']){{$_GET['numero_processo']}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-3">
                                            <label for="referencia">Referência</label>
                                            <input type="text" class="form-control form-control-sm" name="referencia" value="@isset($_GET['referencia']){{$_GET['referencia']}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-3">
                                            <label for="titular_processo">Titular do Processo</label>
                                            <input type="text" class="form-control form-control-sm" name="titular_processo" value="@isset($_GET['titular_processo']){{$_GET['titular_processo']}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-3">
                                            <label for="adm_insolvencia">AI</label>
                                            <input type="text" class="form-control form-control-sm" name="adm_insolvencia" value="@isset($_GET['adm_insolvencia']){{$_GET['adm_insolvencia']}}@endisset">
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

                <div class="col-12 mt-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block"><h3 class="card-title"><b>Processos Abertos</b></h3></div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nº Processo</th>
                                            <th scope="col">Referência</th>
                                            <th scope="col">Tipo de Processo</th>
                                            <th scope="col">Data de Entrada</th>
                                            <th scope="col">Data Auto Penhora</th>
                                            <th scope="col">Comarca</th>
                                            <th scope="col">Tribunal</th>
                                            <th scope="col">Consultor</th>
                                            <th scope="col">Asset</th>
                                            <th scope="col">Titular do Processo</th>
                                            <th scope="col">Entidade</th>
                                            <th scope="col">AI</th>
                                            <th scope="col">Moeda</th>
                                            <th scope="col">Pais</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($processos as $processo)
                                            <tr>
                                                <th scope="row">{{ $processo->id }}</th>
                                                <td>{{ $processo->numero_processo }}</td>
                                                <td>{{ $processo->referencia }}</td>
                                                <td>{{ $processo->tipo_processo->name }}</td>
                                                <td>{{ conDate($processo->data_entrada, 'DMY', '/') }}</td>
                                                <td>{{ conDate($processo->data_auto_penhora, 'DMY', '/') }}</td>
                                                <td>{{ $processo->comarca->name }}</td>
                                                <td>{{ $processo->tribunal->name }}</td>
                                                <td>{{ $processo->consultor->name }}</td>
                                                <td>{{ $processo->asset->name }}</td>
                                                <td>{{ $processo->titular_processo }}</td>
                                                <td>{{ $processo->entidade }}</td>
                                                <td>{{ $processo->adm_insolvencia->name }}</td>
                                                <td>{{ $processo->moeda->name }}</td>
                                                <td>{{ $processo->pais->name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{route('processo.edit', $processo->id)}}"><button class="btn btn-primary mx-1"><i class="fas fa-edit"></i> Editar</button></a>
                                                        </div>
                                                        <div>
                                                            <a href="{{route('processo.delete', $processo->id)}}" onclick="return confirm('Você tem certeza que deseja deletar isso?');" class="btn btn-danger mx-1"><i class="fas fa-trash"></i> Excluir</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $processos->appends([
                                'data_entrada_inicial'  => (isset($_GET['data_entrada_inicial']) ? $_GET['data_entrada_inicial'] : ''),
                                'data_entrada_final'    => (isset($_GET['data_entrada_final']) ? $_GET['data_entrada_final'] : ''),
                                'numero_processo'       => (isset($_GET['numero_processo']) ? $_GET['numero_processo'] : ''),
                                'referencia'            => (isset($_GET['referencia']) ? $_GET['referencia'] : ''),
                                'titular_processo'      => (isset($_GET['titular_processo']) ? $_GET['titular_processo'] : ''),
                                'adm_insolvencia'       => (isset($_GET['adm_insolvencia']) ? $_GET['adm_insolvencia'] : ''),
                            ])->links()  }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
