@extends('layouts.painel')

@section('content')
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

                                    <div class="col-8 my-2">
                                        <div class="row">
                                            <div class="col-3 d-flex align-items-center justify-content-end"><label for="">Modelo da Tarefa</label></div>
                                            <div class="col-9"><input type="text" name="" placeholder="Titulo da Tarefa" class="form-control"></div>
                                        </div>
                                    </div>

                                    <div class="col-8 my-2">
                                        <div class="row">
                                            <div class="col-3 d-flex align-items-center justify-content-end">
                                                <label for="">Alocados <button type="button" class="btn btn-faq"><i class="far fa-question-circle"></i></button></label>
                                            </div>
                                            <div class="col-9 d-flex">
                                                <div class="mr-2"><button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i></button></div>
                                                <select name="" class="select2 form-control" multiple>
                                                    <option value="teste">teste</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8 my-2">
                                        <div class="row">
                                            <div class="col-3 d-flex align-items-center justify-content-end">
                                                <label for="">Departamento <button type="button" class="btn btn-faq"><i class="far fa-question-circle"></i></button></label>
                                            </div>
                                            <div class="col-9">
                                                <select name="" class="select2 form-control">
                                                    <option value="">Selecione uma Opção</option>
                                                    <option value="teste">teste</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8 my-2">
                                        <div class="row">
                                            <div class="col-3 d-flex align-items-center justify-content-end"><label for="">Processo <button type="button" class="btn btn-faq"><i class="far fa-question-circle"></i></button></label></div>
                                            <div class="col-4"><input type="text" name="" placeholder="Titulo da Tarefa" class="form-control"></div>

                                            <div class="col-1 d-flex align-items-center justify-content-end">
                                                <label for="">AI</label>
                                            </div>
                                            <div class="col-4">
                                                <select name="" class="select2 form-control">
                                                    <option value="">Selecione uma Opção</option>
                                                    <option value="teste">teste</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8 my-2">
                                        <textarea name="description" class="textarea"></textarea>
                                    </div>

                                    <div class="col-8 mt-2 mb-5">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <button type="button" class="btn"><i class="fas fa-paperclip"></i></button>
                                                    </div>
                                                    <div class="col-1">
                                                        <button type="button" class="btn"><i class="fas fa-calendar"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 text-right">
                                                <button type="button" class="btn btn-primary">Criar Tarefa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
