@extends('layouts.painel')

@section('content')
    <div class="container my-3">
        <div class="tarefa-header card">
            <div class="row justify-content-between my-4">
                <div class="ml-5 d-flex">
                    <div>
                        <button class="btn btn-primary">Não iniciado</button>
                    </div>
                    <div class="ml-3">
                        <button class="btn btn-primary"><i class="fas fa-user-plus"></i></button>
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
                    <span class="baixo">Criada por: @foreach ($tarefa->alocados as $alocado)   @if ($loop->first){{ $alocado->name }} {{ date('d/m/Y H:m:i', strtotime($tarefa->created_at)) }} @endif @endforeach</span>
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
                            @foreach ($tarefa->anexos as $anexo)
                                {{ $anexo->anexo_nome }}
                            @endforeach
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
                        <h3 class="text-danger">Não iniciada</h3>
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
                        <h3>00:00:00</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
