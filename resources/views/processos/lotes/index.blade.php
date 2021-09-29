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
                                            <label for="data_fim_inicial">Data Fim Inicial</label>
                                            <input type="text" class="form-control form-control-sm date-mask" name="data_fim_inicial" value="@isset($_GET['data_fim_inicial']){{$_GET['data_fim_inicial']}}@else{{date('d/m/Y')}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-2">
                                            <label for="data_fim_final">Data Fim Final</label>
                                            <input type="text" class="form-control form-control-sm date-mask" name="data_fim_final" value="@isset($_GET['data_fim_final']){{$_GET['data_fim_final']}}@else{{date('d/m/Y')}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-2">
                                            <label for="numero_processo">Numero</label>
                                            <input type="text" class="form-control form-control-sm" name="numero_processo" value="@isset($_GET['numero_processo']){{$_GET['numero_processo']}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-3">
                                            <label for="referencia">Referência</label>
                                            <input type="text" class="form-control form-control-sm" name="referencia" value="@isset($_GET['referencia']){{$_GET['referencia']}}@endisset">
                                        </div>
                                        <div class="form-group col-6 col-md-3">
                                            <label for="titular_processo">Titulo</label>
                                            <input type="text" class="form-control form-control-sm" name="titular_processo" value="@isset($_GET['titular_processo']){{$_GET['titular_processo']}}@endisset">
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
                                <div class="col-6 my-1 d-none d-md-block"><h3 class="card-title"><b>Lotes do Processo</b></h3></div>
                                <div class="col-6 my-1 text-right"><a href="{{route('lote.create', $processo_id)}}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo Lote</a></div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Numero</th>
                                            <th scope="col">Referência</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">V. Abertura</th>
                                            <th scope="col">V. Minimo</th>
                                            <th scope="col">V. Base</th>
                                            <th scope="col">V. Venda</th>
                                            <th scope="col">Data Fim</th>
                                            <th scope="col">Data Fim Efetiva</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lotes as $lote)
                                            <tr>
                                                <th scope="row">{{ $lote->id }}</th>
                                                <td>{{ $lote->nuemro }}</td>
                                                <td>{{ $lote->referencia }}</td>
                                                <td>{{ $lote->titulo }}</td>
                                                <td>{{ $lote->valor_abertura ? number_format($lote->valor_abertura, 2, ',', '.') : '' }}</td>
                                                <td>{{ $lote->valor_minimo ? number_format($lote->valor_minimo, 2, ',', '.') : '' }}</td>
                                                <td>{{ $lote->valor_base ? number_format($lote->valor_base, 2, ',', '.') : '' }}</td>
                                                <td>{{ $lote->valor_venda ? number_format($lote->valor_venda, 2, ',', '.') : '' }}</td>
                                                <td>{{ conDate($lote->data_fim, 'DMYHIS', '/') }}</td>
                                                <td>{{ conDate($lote->data_fim_efetiva, 'DMYHIS', '/') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{route('lotes.edit', $lote->id)}}"><button class="btn btn-primary mx-1"><i class="fas fa-edit"></i> Editar</button></a>
                                                        </div>
                                                        <div>
                                                            <a href="{{route('lotes.delete', $lote->id)}}" onclick="return confirm('Você tem certeza que deseja deletar isso?');" class="btn btn-danger mx-1"><i class="fas fa-trash"></i> Excluir</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $lotes->appends([
                                'data_fim_inicial'  => (isset($_GET['data_fim_inicial']) ? $_GET['data_fim_inicial'] : ''),
                                'data_fim_final'    => (isset($_GET['data_fim_final']) ? $_GET['data_fim_final'] : ''),
                                'numero'            => (isset($_GET['numero']) ? $_GET['numero'] : ''),
                                'referencia'        => (isset($_GET['referencia']) ? $_GET['referencia'] : ''),
                                'titulo'            => (isset($_GET['titular_processo']) ? $_GET['titular_processo'] : ''),
                            ])->links()  }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
