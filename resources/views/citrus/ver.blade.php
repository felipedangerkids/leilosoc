@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="my-1 mx-2"><a href="{{route('painel.tarefa.criar', $citius->id)}}" class="btn btn-dark"><i class="fas fa-calendar-plus"></i> Abrir Tarefa</a></div>
                                <div class="my-1 mx-2"><button class="btn btn-dark" data-toggle="modal" data-target="#assets"><i class="fas fa-camera"></i> Asset</button></div>
                                <div class="my-1 mx-2"><button class="btn btn-dark" data-toggle="modal" data-target="#calendarioModal"><i class="fas fa-calendar"></i> Abrir Calendario</button></div>
                                <div class="my-1 mx-2"><button class="btn btn-dark" data-toggle="modal" data-target="#depesas"><i class="fas fa-euro-sign"></i> Despesas</button></div>
                                <div class="my-1 mx-2"><button class="btn btn-success"><i class="fas fa-calendar-check"></i> Finalizar Tarefa</button></div>
                            </div>
                        </div>

                        <div class="card-body pad">
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
                        </div>
                    </div>
                </div>

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
    @component('components.modal.modal', ['rota' => route('painel.tarefas.store'), 'title' => 'Nova tarefa', 'idModal' =>
        'tarefas'])
        <div class="col-md-6 mt-3">
            <label for="inputEmail4" class="form-label">Número do Processo</label>
            <input name="name" type="text" value="{{ Str::limit($citius->processo, 14, '') }}" class="form-control"
                id="inputEmail4">
            <div class="mt-3 ">
                <article>
                    <span class="btn btn-primary" onclick="mostrar('ma')">ESCOLHA UM MODELO</span>
                    <div class="hidden" id="ma">

                        <div class="input-group mt-3">
                            <div class="form-outline">
                                <input type="search" name="search" id="search" class="form-control busca"
                                    placeholder="Pesquisar Modelos">
                            </div>
                            <button type="button" class="btn btn-busca">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <div class="modelos mt-3">
                            <h2>DEPARTAMENTO</h2>
                            <div class="accordion" id="accordionExample">
                                @foreach ($categorias as $categoria)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse-{{ $categoria->id }}"
                                                    aria-expanded="true" aria-controls="collapse-{{ $categoria->id }}">
                                                    {{ $categoria->name }}
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapse-{{ $categoria->id }}" class="collapse "
                                            aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                @foreach ($modelos as $modelo)
                                                    @if ($categoria->id == $modelo->categoria_id)
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="{{ $modelo->name }}"
                                                                type="radio" name="modelo" id="exampleRadios1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                {{ $modelo->name }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </article>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <div class="col-md-6 mt-3">
            <label class="form-label" for="departamento">Departamento</label>
            <select class="form-control " name="departamento_id" id="departamento">
                <option selected>Escolha Departamento</option>
                @foreach ($departamentos as $departamento)

                    <option value="{{ $departamento->id }}" @if (($insolente->responsavel->departamento_id ?? '') == $departamento->id) selected @endif>{{ $departamento->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mt-3">
            <label class="form-label" for="departamento">Colaborador(a)</label>
            <select class="form-control " name="user_id" id="departamento">

                <option selected>Escolha Colaborador(a)</option>
                @foreach ($users as $user)

                    <option value="{{ $user->id }}" @if (($insolente->responsavel->id ?? '') == $user->id) selected @endif>
                        {{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="date col-md-3 mt-3">
            <label for="pedido">Data do Pedido</label>
            <input name="inicio" type="text" class="form-control pedido" id="pedido">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <div class="date col-md-3 mt-3">
            <label class="form-label" for="limite">Data Limite</label>
            <input name="fim" type="text" class="form-control limite" id="limite">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>


        <div class="col-md-3 mt-3">
            <label for="inputZip" class="form-label">Código Postal</label>
            <input name="cep" type="text" class="form-control" id="cep">
        </div>
        <div class="col-md-3 mt-5">
            <button type="button" id="buscar" class="btn btn-dark">Buscar</button>
        </div>
        <div class="col-md-6 mt-3">
            <label class="form-label" for="morada">Morada</label>
            <input name="morada" class="form-control" type="text" id="morada">
        </div>
        <div class="col-md-3 mt-3">
            <label class="form-label" for="morada">Número da Porta</label>
            <input name="porta" class="form-control" type="text" id="porta">
        </div>
        <div class="col-md-3 mt-3">
            <label class="form-label" for="morada">Região</label>
            <input name="regiao" class="form-control" type="text" id="regiao">
        </div>
        <div class="col-md-3 mt-3">
            <label class="form-label" for="morada">Distrito</label>
            <input name="distrito" class="form-control" type="text" id="distrito">
        </div>
        <div class="col-md-3 mt-3">
            <label class="form-label" for="morada">Conselho</label>
            <input name="conselho" class="form-control" type="text" id="conselho">
        </div>
        <div class="col-md-3 mt-3">
            <label class="form-label" for="morada">Freguesia</label>
            <input name="freguesia" class="form-control" type="text" id="freguesia">
        </div>
        <div class="input-group mb-3 mt-3 col-md-6">
            <input name="path" type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Anexo</label>
        </div>
        <div class="compartilhar d-flex ml-5 ">
            <span>Compartilhar: </span>
            <div class="form-check custom-radio ml-2  col-md-3">
                <input name="compartilhar" class="form-check-input" type="radio" id="inlineRadio1" value="sim">
                <label class="form-check-label" for="inlineRadio1">SIM</label>
            </div>
            <div class="form-check custom-radio ml-lg-2 col-md-3">
                <input class="form-check-input" type="radio" name="compartilhar" id="inlineRadio2" value="nao">
                <label class="form-check-label" for="inlineRadio2">NÃO</label>
            </div>
        </div>
    @endcomponent
    @component('components.modal.modal', ['rota' => route('assets.post'), 'title' => 'Novo Asset', 'idModal' => 'assets'])
        <div class="col-md-12 mt-3">
            <label for="inputEmail4" class="form-label">Numero do Processo</label>
            <input name="numero" type="text" value="{{ $citius->processo }}" class="form-control" id="inputEmail4">
        </div>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="col-md-12 mt-3">
            <label for="inputEmail4" class="form-label">Km Inicial</label>
            <input name="kmini" type="text" class="form-control" id="inputEmail4">
        </div>
    @endcomponent
    @component('components.modal.modal', ['rota' => route('leilao.post'), 'title' => 'Novo Calendário', 'idModal' =>
        'calendarioModal'])
        <div class="form-group col-md-4">
            <label for="exampleFormControlSelect1">Tipo</label>
            <select name="tipo" class="form-control" id="exampleFormControlSelect1">
                <option value="Presencial">Presencial</option>
                <option value="Matrix">Matrix</option>
                <option value="Eletrónico">Eletrónico</option>
                <option value="Carta Fechada">Carta Fechada</option>
                <option value="Buy Now">Buy Now</option>
                <option value="Negociação Particular">Negociação Particular</option>
            </select>
        </div>
        <div class="date col-md-4 form-group">
            <label for="pedido">Data inicio</label>
            <input name="inicio" type="text" class="form-control pedido" id="pedido">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <div class="date col-md-4 form-group">
            <label for="pedido">Data Fim</label>
            <input name="fim" type="text" class="form-control pedido" id="pedido">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Processo</label>
            <input type="text" name="processo" class="form-control" value="{{ Str::limit($citius->processo, 14, '') }}"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Descrição</label>
            <input type="text" name="descricao" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Consultora</label>
            <select name="consultora" class="form-control" id="exampleFormControlSelect1">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Asset</label>
            <select name="asset" class="form-control" id="exampleFormControlSelect1">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Visitas</label>
            <textarea class="form-control" name="visitas" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="date col-md-4 form-group">
            <label for="pedido">Entrada</label>
            <input name="entrada" type="text" class="form-control pedido" id="pedido">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">A vender</label>
            <input type="text" name="vender" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-check col-md-2 mt-5">
            <input class="form-check-input" name="reducao" type="checkbox" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Redução
            </label>
        </div>
        <div class="form-check col-md-2 mt-5">
            <input class="form-check-input" name="estado" type="checkbox" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Estado
            </label>
        </div>
        <div class="col-md-4">
            <div>
                <p>Comunicações</p>
            </div>
            <div class="d-flex ">
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="comunicacoes" id="exampleRadios1" value="sim" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Sim
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="comunicacoes" id="exampleRadios1" value="nao" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Não
                    </label>
                </div>
            </div>
            <div class="date form-group mt-2">
                <label for="pedido">Data</label>
                <input name="data_com" type="text" class="form-control pedido" id="pedido">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <p>Processo Online</p>
            </div>
            <div class="d-flex ">
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="pro_online" id="exampleRadios1" value="sim" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Sim
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="pro_online" id="exampleRadios1" value="nao" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Não
                    </label>
                </div>
            </div>
            <div class="date form-group mt-2">
                <label for="pedido">Data</label>
                <input name="data_pro" type="text" class="form-control pedido" id="pedido">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <p>Catálago Online</p>
            </div>
            <div class="d-flex ">
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="cat_online" id="exampleRadios1" value="sim" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Sim
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="cat_online" id="exampleRadios1" value="nao" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Não
                    </label>
                </div>
            </div>
            <div class="date form-group mt-2">
                <label for="pedido">Data</label>
                <input name="data_cat" type="text" class="form-control pedido" id="pedido">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Observações</label>
            <textarea class="form-control" name="obs" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    @endcomponent
@endsection
