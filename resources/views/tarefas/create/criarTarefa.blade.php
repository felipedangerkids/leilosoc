@extends('layouts.painel')

@section('content')
    <form action="{{route('painel.tarefas.store')}}" method="post">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body pad">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12 mt-4 mb-2 d-flex justify-content-center">
                                            <div><h4>Criar nova tarefa <button type="button" class="btn btn-faq"><i class="far fa-question-circle"></i></button></h4></div>
                                            <button type="button" class="btn btn-close-times" data-title="Cancelar criação de Tarefa?" data-route="{{route('painel.tarefas')}}"><i class="fas fa-times"></i></button>
                                        </div>
    
                                        <div class="col-9 my-2">
                                            <div class="row">
                                                <div class="col-3 d-flex align-items-center justify-content-end"><label for="">Modelo da Tarefa</label></div>
                                                <div class="col-9"><input type="text" name="modelo" placeholder="Titulo da Tarefa" class="form-control"></div>
                                            </div>
                                        </div>
    
                                        <div class="col-9 my-2">
                                            <div class="row">
                                                <div class="col-3 d-flex align-items-center justify-content-end">
                                                    <label for="">Alocados <button type="button" class="btn btn-faq"><i class="far fa-question-circle"></i></button></label>
                                                </div>
                                                <div class="col-9 d-flex">
                                                    <div class="mr-2"><button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i></button></div>
                                                    <select name="alocados[]" class="select2 form-control" multiple>
                                                        @foreach ($users as $user)
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-9 my-2">
                                            <div class="row">
                                                <div class="col-3 d-flex align-items-center justify-content-end">
                                                    <label for="">Departamento <button type="button" class="btn btn-faq"><i class="far fa-question-circle"></i></button></label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="departamento" class="select2 form-control">
                                                        <option value="">Selecione uma Opção</option>
                                                        @foreach ($departamentos as $departamento)
                                                            <option value="{{$departamento->id}}">{{$departamento->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-9 my-2">
                                            <div class="row">
                                                <div class="col-3 d-flex align-items-center justify-content-end"><label for="">Processo <button type="button" class="btn btn-faq"><i class="far fa-question-circle"></i></button></label></div>
                                                <div class="col-4"><input type="text" name="numero_processo" value="{{$citius->processo ?? ''}}" placeholder="Numero do Processo" class="form-control"></div>
    
                                                <div class="col-1 d-flex align-items-center justify-content-end">
                                                    <label for="">AI</label>
                                                </div>
                                                <div class="col-4">
                                                    <select name="ai" class="select2 form-control">
                                                        <option value="">Selecione uma Opção</option>
                                                        @foreach ($insolventes as $insolvente)
                                                            <option value="{{$insolvente->id}}" @if($citius) @if($citius->nif_adm == $insolvente->nif) selected @endif @endif>{{$insolvente->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-9 my-2">
                                            <div class="row">
                                                <div class="col-3 d-flex align-items-center justify-content-end">
                                                    <label for="">Data da Tarefa <button type="button" class="btn btn-faq"><i class="far fa-question-circle"></i></button></label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="start_end_date" class="form-control date-mask">
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-9 my-2">
                                            <textarea name="description" class="textarea"></textarea>
                                        </div>
    
                                        <div class="col-9 mt-2 mb-5">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="button" class="btn" data-toggle="modal" data-target="#anexos"><i class="fas fa-paperclip"></i> anexos</button>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-6 text-right">
                                                    <button type="submit" class="btn btn-primary">Criar Tarefa</button>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="d-none anexos"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Limpar</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
