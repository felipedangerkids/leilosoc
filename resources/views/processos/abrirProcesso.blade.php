@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 col-md-3 my-1"><h3 class="card-title"><b>Abrir Processo</b></h3></div>
                                <div class="col-6 col-md-3 my- ml-auto d-flex justify-content-end"><a onclick="return confirm('Cancelar Abertura de Processo?');" href="{{route('processo')}}" class="btn btn-danger"><i class="fas fa-times"></i> Cancelar</a></div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="container">
                                <form action="{{ route('processo.abrir') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="citius_id" value="{{ $citius->id }}">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="numero_processo">Nº Processo</label>
                                            <input type="text" name="numero_processo" value="{{$citius->processo}}" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="referencia">Referência</label>
                                            <input type="text" name="referencia" value="{{$citius->referencia}}" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="tipo_processo">Tipo Processo</label>
                                            <select name="tipo_processo" class="select2 form-control">
                                                <option value="">Selecone uma Opção</option>
                                                @foreach ($tiposProcessos as $tipo_processo)
                                                    <option value="{{$tipo_processo->id }}">{{$tipo_processo->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="data_entrada">Data de Entrada</label>
                                            <input type="text" name="data_entrada" value="" class="form-control date-mask">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="data_auto_penhora">Data Auto Penhora</label>
                                            <input type="text" name="data_auto_penhora" value="" class="form-control date-mask">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="comarca">Comarca</label>
                                            <select name="comarca" class="select2 form-control">
                                                <option value="">Selecone uma Opção</option>
                                                @foreach ($comarcas as $comarca)
                                                    <option value="{{$comarca->id }}">{{$comarca->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="tribunal">Tribunal</label>
                                            <select name="tribunal" class="select2 form-control">
                                                <option value="">Selecone uma Opção</option>
                                                @foreach ($tribunais as $tribunal)
                                                    <option value="{{$tribunal->id }}" @if($citius->tribunal == $tribunal->name) selected @endif>{{$tribunal->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="consultor">Consultor</label>
                                            <select name="consultor" class="select2 form-control">
                                                <option value="">Selecone uma Opção</option>
                                                @foreach ($consultores as $consultor)
                                                    <option value="{{$consultor->id }}">{{$consultor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="asset">Asset</label>
                                            <select name="asset" class="select2 form-control">
                                                <option value="">Selecone uma Opção</option>
                                                @foreach ($assets as $asset)
                                                    <option value="{{$asset->id }}">{{$asset->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="titular_processo">Titular do Processo</label>
                                            <input type="text" name="titular_processo" value="" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="entidade">Entidade</label>
                                            <input type="text" name="entidade" value="" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="adm_insolvencia">Administrador Insolvência</label>
                                            <select name="adm_insolvencia" class="select2 form-control">
                                                <option value="">Selecone uma Opção</option>
                                                @foreach ($insolventes as $insolvente)
                                                    <option value="{{$insolvente->id }}" @if($citius->nif_adm == $insolvente->nif) selected @endif>{{$insolvente->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-3">
                                            <label for="moeda">Moeda</label>
                                            <select name="moeda" class="select2 form-control">
                                                <option value="">Selecone uma Opção</option>
                                                @foreach ($moedas as $moeda)
                                                    <option value="{{$moeda->id }}">{{$moeda->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-3">
                                            <label for="pais">Pais</label>
                                            <select name="pais" class="select2 form-control">
                                                <option value="">Selecone uma Opção</option>
                                                @foreach ($paises as $pais)
                                                    <option value="{{$pais->id }}">{{$pais->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="form-group col-12 col-md-6">
                                            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Abrir Processo</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
