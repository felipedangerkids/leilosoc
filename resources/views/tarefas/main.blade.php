@extends('layouts.painel')

@section('content')
    @php
        $alocados = [];
        foreach ($tarefa->alocados as $alcoado) {
            $alocados[] = $alcoado->id;
        }
    @endphp

    <div class="container my-3">
        <div class="tarefa-header card">
            <div class="row justify-content-between my-4">
                <div class="ml-5 d-flex">
                    <div>
                        @if ($tarefa->evento == 'play')
                            <button class="btn btn-success btn-relogio" data-evento="{{ $tarefa->evento == 'play' ? 'stop' : 'play' }}" data-id="{{ $tarefa->id }}" data-tarefa="interna">Iniciado</button>
                        @elseif($tarefa->evento == 'stop')
                            <button class="btn btn-success btn-relogio" data-evento="{{ $tarefa->evento == 'play' ? 'stop' : 'play' }}" data-id="{{ $tarefa->id }}" data-tarefa="interna">Pausada</button>
                        @else
                            <button class="btn btn-danger btn-relogio" data-evento="{{ $tarefa->evento == 'play' ? 'stop' : 'play' }}" data-id="{{ $tarefa->id }}" data-tarefa="interna">Não iniciado</button>
                        @endif
                    </div>
                    <div class="ml-3">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#alocados"><i class="fas fa-user-plus"></i></button>
                    </div>
                </div>
                <div class="mr-5 d-flex ">
                    <div>
                        <button class="btn btn-primary">Compartilhar</button>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin: 0;" class="row tarefas">
            <div class="card col-md-9">
                <div class="titulo-tarefa mt-4 mx-5">
                    <h3>{{ $tarefa->modelo }}</h3>
                    <span class="baixo">Criada por: {{ $tarefa->responsavel->name ?? 'Admin' }} {{ date('d/m/Y H:m:i', strtotime($tarefa->created_at)) }}</span>
                </div>
                <div class="m-5">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                aria-controls="pills-home" aria-selected="true">Descrição</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Comentários</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">Anexos</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="mx-3">
                                {!! $tarefa->description !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="mx-3 coment-corpo">
                                @foreach ($comentarios as $comentario)
                                    <div class="w-100 bg-azul p-3 coment my-3">
                                        <span>{{ $comentario->user->name }} {{ date('d/m/Y H:m:i', strtotime($comentario->created_at)) }}</span>
                                        <p>{{ $comentario->coment }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mx-3 my-3">
                                <form action="{{ url('tarefa/comment/post') }}" id="form-coment" method="post">
                                    @csrf
                                    <input type="hidden" name="tarefa_id" value="{{ $tarefa->id }}">
                                    <div class="input-group mb-3">
                                        <input type="text" name="coment" class="form-control"
                                            placeholder="Escreva seu comentário" id="coment">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="btn-coment">Comentar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                @foreach ($tarefa->anexos as $anexo)
                                    <div class="col-2 p-2" id="anexo-{{$anexo->id}}">
                                        <div class="pb-2 text-center">
                                            <a title="Baixar Arquivo" target="_blank" href="{{asset('storage/'.$anexo->anexo_nome)}}" class="btn btn-dark"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                        <div class="text-center">
                                            <a title="Apagar Arquivo" type="button" data-id="{{$anexo->id}}" data-route="{{route('painel.tarefas.anexoTarefa', $anexo->id)}}" class="btn btn-link btn-remove-anexo">Apagar</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <a target="_blank" class="btn btn-dark" href="{{route('painel.tarefas.anexos.baixar', $tarefa->id)}}">Baixar Todos Anexos</a>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#anexos">Anexar Arquivos</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex flex-column lateral">
                    <div>
                        <h4>Data de entrega</h4>
                        <h3>{{ date('d/m/Y', strtotime($tarefa->fim)) }}</h3>
                    </div>
                    <div>
                        <h4>Incio da tarefa</h4>
                        @if ($tarefa->evento == 'play' || $tarefa->evento == 'stop')
                            <h3 class="text-success">Iniciada</h3>
                            <h3>{{date('d-m-Y H:i:s', strtotime($tarefa->start_time))}}</h3>
                        @else
                            <h3 class="text-danger">Não iniciada</h3>
                        @endif
                    </div>
                    <div>
                        <h4>Processo</h4>
                        <h3>{{ $tarefa->numero_processo }}</h3>
                    </div>
                    <div>
                        <h4>Departamento</h4>
                        <h3>{{ $tarefa->departamento->name }}</h3>
                    </div>
                    <div>
                        <h4>Total trabalhado</h4>
                        @php
                            $since_start = getTimeDiff(date('Y-m-d H:i:s'), $tarefa->start_time);
                            $minutes = $since_start->days * 24 * 60;
                            $minutes += $since_start->h * 3600;
                            $minutes += $since_start->i * 60;
                            $minutes += $since_start->s;
                        @endphp
                        <h3 class="relogio-{{$tarefa->id}} relogios" data-evento="{{$tarefa->evento}}" data-start_time="{{$minutes}}">{{$tarefa->tempo ?? '00:00:00'}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Anexos --}}
    <div class="modal fade" id="anexos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="anexosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="anexosLabel">Anexar Aquivos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="/tarefa/tarefas/anexos" class="dropzone" id="my_dropzone">
                        @csrf
                        <input type="hidden" name="tarefa_id" value="{{$tarefa->id}}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Limpar</button> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Alocados --}}
    <div class="modal fade" id="alocados" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="alocadosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alocadosLabel">Usuarios Alocados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" action="{{route('painel.tarefas.alocados')}}">
                    @csrf
                    <input type="hidden" name="tarefa_id" value="{{$tarefa->id}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Usuarios Alocados na Tarefa</label>
                            <select name="alocados[]" class="select2" multiple>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}" @if(in_array($user->id, $alocados)) selected @endif>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success btn-save" data-save_target="#alocados">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
