@extends('layouts.painel')

@section('content')

    <div class="container">
        <div class="d-flex">

            <div>
                <a href="{{ route('leiloes') }}"><button class="btn btn-dark my-2">Ver no calendario</button></a>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Processo</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Fim</th>
                    <th scope="col">Consultor</th>
                    <th scope="col">Asset</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($leiloes as $leilao)
                    <tr>
                        <th scope="row">{{ $leilao->processo }}</th>
                        <td>{{ $leilao->inicio }}</td>
                        <td>{{ $leilao->fim }}</td>
                        <td>{{ $leilao->consultor->name ?? '' }}</td>
                        <td>{{ $leilao->assets->name ?? ''}}</td>

                        <td>
                            <div class="d-flex">
                                <div>
                                    <a href=""><button class="btn btn-primary mx-1">Editar</button></a>
                                </div>


                            </div>
                        </td>
                    </tr>

                @endforeach


            </tbody>
        </table>



    </div>
    @component('components.modal.modal', ['rota' => route('leilao.post'), 'title' => 'Novo Calendário', 'idModal' => 'staticBackdrop'])
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
            <input type="text" name="processo" class="form-control" value="@if ($processo) {{ Str::limit($processo->processo, 14, '') }} @endif" id="exampleInputEmail1"
                aria-describedby="emailHelp">
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
            <input class="form-check-input" name="reducao" type="checkbox"  id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Redução
            </label>
        </div>
        <div class="form-check col-md-2 mt-5">
            <input class="form-check-input" name="estado" type="checkbox"  id="defaultCheck1">
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
                    <input class="form-check-input" type="radio" name="comunicacoes" id="exampleRadios1" value="sim"
                        checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Sim
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="comunicacoes" id="exampleRadios1" value="nao"
                        checked>
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
                    <input class="form-check-input" type="radio" name="pro_online" id="exampleRadios1" value="sim"
                        checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Sim
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="pro_online" id="exampleRadios1" value="nao"
                        checked>
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
                    <input class="form-check-input" type="radio" name="cat_online" id="exampleRadios1" value="sim"
                        checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Sim
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="cat_online" id="exampleRadios1" value="nao"
                        checked>
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
