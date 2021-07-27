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
          <div class="my-3">
           <a href="{{ route('painel.tarefas', $citius->id) }}">  <button class="btn btn-dark">Abrir Tarefa</button></a>
          </div>
    </div>
@endsection
