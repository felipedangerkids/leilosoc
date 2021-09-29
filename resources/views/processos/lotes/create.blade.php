@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 col-md-3 my-1"><h3 class="card-title"><b>Criar Lote</b></h3></div>
                                <div class="col-6 col-md-3 my- ml-auto d-flex justify-content-end"><a onclick="return confirm('Cancelar Abertura de Processo?');" href="{{route('processo')}}" class="btn btn-danger"><i class="fas fa-times"></i> Cancelar</a></div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="container">
                                <form action="{{ route('lotes', $processo_id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12"><h3>Informações do Lote</h3></div>

                                        <div class="form-group col-12 col-md-4">
                                            <label for="numero">Numero <span class="text-danger">*</span></label>
                                            <input type="text" name="numero" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="referencia">Referência</label>
                                            <input type="text" name="referencia" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="valor_abertura">Valor Abertura</label>
                                            <input type="text" name="valor_abertura" class="form-control money">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="valor_minimo">Valor Minimo</label>
                                            <input type="text" name="valor_minimo" class="form-control money">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="valor_base">Valor Base <span class="text-danger">*</span></label>
                                            <input type="text" name="valor_base" class="form-control money">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="valor_venda">Valor Venda</label>
                                            <input type="text" name="valor_venda" class="form-control money">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="estimativa_minima">Estimativa Minima (Arte)</label>
                                            <input type="text" name="estimativa_minima" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="estimativa_maxima">Estimativa Maxima (Arte)</label>
                                            <input type="text" name="estimativa_maxima" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="iva">IVA <span class="text-danger">*</span></label>
                                            <select name="iva" class="form-control select2">
                                                @foreach ($impostos as $imposto)
                                                    <option value="{{$imposto->id}}">{{$imposto->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="moeda">Moeda <span class="text-danger">*</span></label>
                                            <select name="moeda" class="select2 form-control">
                                                <option value="">Selecione uma Moeda</option>
                                                @foreach ($moedas as $moeda)
                                                    <option value="{{$moeda->id}}">{{$moeda->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="estado_licitacao">Estado da Licitação</label>
                                            <select name="estado_licitacao" class="form-control select2">
                                                <option value="bloqueado">Bloqueado</option>
                                                <option value="liberado">Liberado</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="data_fim">Data de Fim</label>
                                            <input type="text" name="data_fim" class="form-control date-mask-time">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="data_fim_efetiva">Data de Fim Efetiva</label>
                                            <input type="text" name="data_fim_efetiva" class="form-control date-mask-time">
                                        </div>

                                        <div class="form-group col-12 col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" name="publicar" value="true" type="checkbox">
                                                <label class="form-check-label">Publicar</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="vendido" value="true" type="checkbox">
                                                <label class="form-check-label">Vendido</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="venda_anulada" value="true" type="checkbox">
                                                <label class="form-check-label">Venda Anulada</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" name="destaque" value="true" type="checkbox">
                                                <label class="form-check-label">Destaque</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="bolsa_imoveis" value="true" type="checkbox">
                                                <label class="form-check-label">Bolsa de Imóveis</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="faturado" value="true" type="checkbox">
                                                <label class="form-check-label">Faturado</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" name="pago" value="true" type="checkbox">
                                                <label class="form-check-label">Pago</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="venda_realizada" value="true" type="checkbox">
                                                <label class="form-check-label">Venda Realizada</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="form-group col-12"><h3>Descrição do Lote</h3></div>

                                        <div class="form-group col-12">
                                            <label for="titulo">Titulo <span class="text-danger">*</span></label>
                                            <input type="text" name="titulo" class="form-control">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="descricao">Descrição</label>
                                            <textarea name="descricao" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="subtitulo">Subtitulo (Arte)</label>
                                            <input type="text" name="subtitulo" class="form-control">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="breve_descricao">Breve Descrição (Arte)</label>
                                            <textarea name="breve_descricao" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="autor">Autor (Arte)</label>
                                            <input type="text" name="autor" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="curador">Curador (Arte)</label>
                                            <input type="text" name="curador" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="especialista">Especialista</label>
                                            <input type="text" name="especialista" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="vendedor">Vendedor</label>
                                            <input type="text" name="vendedor" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3 justify-content-center">
                                        <div class="form-group col-12 col-md-6">
                                            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Gravar Lote</button>
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
