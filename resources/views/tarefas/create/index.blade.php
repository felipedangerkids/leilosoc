@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block">
                                    <h3 class="card-title"><b>Tarefas</b></h3>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 my-1"><a href="{{ route('tarefa.calendario') }}"
                                        class="btn  btn-dark mx-1"><i class="fas fa-calendar"></i> Agenda de Tarefas</a>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 my-1 ml-auto">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="search" name="name" class="form-control no-date @isset($_GET['coluna']) @if($_GET['coluna'] == 'data') d-none @endif @endisset" value="@isset($_GET['name']){{$_GET['name']}}@endisset" @isset($_GET['coluna']) @if($_GET['coluna'] == 'data') disabled @endif @endisset placeholder="buscar">
                                            <input type="text" name="name" class="form-control date-mask {{!empty($_GET['coluna']) ? ($_GET['coluna'] !== 'data' ? 'd-none' : '') : 'd-none'}}" value="@isset($_GET['name']){{$_GET['name']}}@endisset" placeholder="buscar" {{!empty($_GET['coluna']) ? ($_GET['coluna'] !== 'data' ? 'disabled' : '') : 'disabled'}}>
                                            <select name="coluna" class="form-control">
                                                <option value="numero_tarefa" @isset($_GET['coluna']) @if($_GET['coluna'] == 'numero_tarefa') selected @endif @endisset>Numero da Tarefa</option>
                                                <option value="data" @isset($_GET['coluna']) @if($_GET['coluna'] == 'data') selected @endif @endisset>Data</option>
                                                <option value="modelo" @isset($_GET['coluna']) @if($_GET['coluna'] == 'modelo') selected @endif @endisset>Modelo</option>
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
                                            <th scope="col">Numero da Tarefa</th>
                                            <th scope="col">Data de Conclus??o</th>
                                            <th scope="col">Modelo</th>
                                            <th scope="col">Respons??veis</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">A????es</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tarefas as $tarefa)
                                            <tr>
                                                <th scope="row">{{ $tarefa->numero_processo }}</th>
                                                <td>{{ date('d/m/Y', strtotime(str_replace('-', '/', $tarefa->fim))) }}
                                                </td>
                                                <td>{{ $tarefa->name }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">{{ $tarefa->alocados->count() }} -
                                                            Respons??veis</button>
                                                        <div class="dropdown-menu">
                                                            @foreach ($tarefa->alocados as $alocado)
                                                                <button type="button"
                                                                    class="dropdown-item">{{ $alocado->name }}</button>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                        $since_start = getTimeDiff(date('Y-m-d H:i:s'), $tarefa->start_time);
                                                        $seconds = $since_start->days * 24 * 60;
                                                        $seconds += $since_start->h * 3600;
                                                        $seconds += $since_start->i * 60;
                                                        $seconds += $since_start->s;
                                                    @endphp
                                                    <div class="relogio-{{ $tarefa->id }} relogios" data-evento="{{ $tarefa->evento }}" data-start_time="{{ $seconds }}">{{ $tarefa->tempo ?? '00:00:00' }}</div>
                                                </td>
                                                <td>

                                                    <div class="d-flex">
                                                        <div>
                                                            <a
                                                                href="{{ route('painel.tarefas.detalhes', $tarefa->id) }}">
                                                                <div class="btn-custom mx-2">
                                                                    <i class="fas fa-eye"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a style="color: red;" href="{{ route('tarefas.delete', $tarefa->id) }}" onclick="return confirm('Voc?? tem certeza que gostaria de deletar isso?');">
                                                                <div class="btn-custom mx-2">
                                                                    <i class="fas fa-trash"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="btn-custom mx-2 btn-relogio"
                                                            data-evento="{{ $tarefa->evento == 'play' ? 'stop' : 'play' }}"
                                                            data-id="{{ $tarefa->id }}">
                                                            <i
                                                                class="fas {{ $tarefa->evento == 'play' ? 'fa-pause text-danger' : 'fa-play text-success' }}"></i>
                                                        </div>
                                                        {{-- <div class="btn-custom mx-2">
                                                            <i class="fas fa-pause" value="Parar" onclick="stop()"></i>
                                                        </div> --}}
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @if (isset($_GET['name']))
                                {{ $tarefas->appends(['name' => $_GET['name'], 'coluna' => $_GET['coluna']])->links()  }}
                            @else
                                {{ $tarefas->links()  }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
