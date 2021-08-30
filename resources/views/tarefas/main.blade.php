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
                    <h3>{{ $tarefa->numero_processo }}</h3>
                    <span class="baixo">Criada por:    @foreach ($tarefa->alocados as $alocado){{ $alocado->name }} @endforeach 23/08/2021 14:35</span>
                </div>
                <div class="m-5">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Descrição</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Comentários</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Anexos</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                      </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex flex-column lateral">
                    <div >
                        <h4>Data de entrega</h4>
                        <h3>30/08/2021</h3>
                    </div>
                    <div>
                        <h4>Incio da tarefa</h4>
                        <h3>Não iniciada</h3>
                    </div>
                    <div>
                        <h4>Processo</h4>
                        <h3>105556588888</h3>
                    </div>
                    <div>
                        <h4>Departamento</h4>
                        <h3>Jurídico</h3>
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
