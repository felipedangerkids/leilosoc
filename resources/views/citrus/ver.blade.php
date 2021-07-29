@extends('layouts.index')

@section('content')
    <div class="container">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Tribunal: {{ $citius->tribunal }}</strong></li>
            <li class="list-group-item"><strong>Ato: {{ $citius->ato }}</strong></li>
            <li class="list-group-item"><strong>Referência: {{ $citius->referencia }}</strong></li>
            <li class="list-group-item"><strong>Processo: {{ $citius->processo }}</strong></li>
            <li class="list-group-item"><strong>Espécie: {{ $citius->especie }}</strong></li>
            <li class="list-group-item"><strong>Data: {{ $citius->data }}</strong></li>
            <li class="list-group-item"><strong>Data da propositura da ação: {{ $citius->data_propositura }}</strong></li>
            <li class="list-group-item"><strong>Insolvente: {{ $citius->insolvente }}</strong></li>
            <li class="list-group-item"><strong>NIF/NIPC: {{ $citius->nif }}</strong></li>
            <li class="list-group-item"><strong>Administrador Insolvência: {{ $citius->adm_insolvencia }}</strong></li>
            <li class="list-group-item"><strong>NIF/NIPC: {{ $citius->nif_adm }}</strong></li>
            <li class="list-group-item"><strong>Credor: {{ $citius->credor }}</strong></li>
            <li class="list-group-item"><strong> NIF/NIPC: {{ $citius->nif_credor }}</strong></li>


        </ul>
        <div class="d-flex ">
            <div class="my-3 mx-2">
                <a href="{{ route('painel.tarefas', $citius->id) }}"> <button class="btn btn-dark">Abrir
                        Tarefa</button></a>
            </div>
            <div class="my-3 mx-2">
                <a href="{{ route('assets', $citius->id) }}"> <button class="btn btn-dark">
                        Asset</button></a>
            </div>
            <div class="my-3 mx-2">
                <a href="{{ route('leilao', $citius->id) }}"> <button class="btn btn-dark">Abrir
                        Calendario</button></a>
            </div>
            <div class="my-3 mx-2">
                <button class="btn btn-dark" data-toggle="modal" data-target="#depesas">Despesas</button>
            </div>
            <div class="my-3 mx-2">
                <a href="#"> <button class="btn btn-success">Finalizar Tarefa</button></a>
            </div>
        </div>
    </div>


    @component('components.modal.modal', ['rota' => route('depesa.post'), 'title' => 'Depesas', 'idModal' => 'depesas'])
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Processo</label>
            <input type="text" name="processo" class="form-control" value="{{ Str::limit($citius->processo, 14, '') }}"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlSelect1">Descrição das Despesas</label>
            <select name="tipo" class="form-control" id="exampleFormControlSelect1">
                <option value="Deslocação identificação dos Bens">Deslocação identificação dos Bens</option>
                <option value="Deslocação Visita">Deslocação Visita</option>
                <option value="Publicidade imprensa">Publicidade imprensa</option>
                <option value="Publicidade Local">Publicidade Local</option>
                <option value="Lona">Lona</option>
                <option value="Troca de Fechaduras">Troca de Fechaduras</option>
                <option value="Escolta Policial">Escolta Policial</option>
                <option value="Hotel - Evento">Hotel - Evento</option>
            </select>
        </div>
        <div class="date col-md-6 form-group">
            <label for="pedido">Data inicio</label>
            <input name="inicio" type="text" class="form-control pedido" id="pedido">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Valor</label>
            <input type="text" name="processo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Inserir KM
            </button>
            <div class="collapse my-2" id="collapseExample">
                <div class="card card-body">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Km inicial</label>
                        <input type="text" name="processo" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Km Final</label>
                        <input type="text" name="processo" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Obs</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    @endcomponent
@endsection
