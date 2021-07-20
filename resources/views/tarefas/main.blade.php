@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="my-2">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Criar
                Nova Tarefa</button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome da Tarefa</th>
                    <th scope="col">Data de conclusão</th>
                    <th scope="col">Projetos</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                    <tr>
                        <th scope="row">{{ $tarefa->id }}</th>
                        <td>{{ $tarefa->name }}</td>
                        <td>{{ $tarefa->data }}</td>
                        <td>{{ $tarefa->projeto }}</td>
                        <td>
                            <div class="d-flex">
                                <div>
                                    <a href="{{ route('painel.tarefa.edit', $tarefa->id) }}"><button
                                            class="btn btn-primary mx-1">Editar</button></a>
                                </div>
                                <div>
                                    <a href="{{ route('painel.tarefa.delete', $tarefa->id) }}"
                                        onclick="return confirm('Você tem certeza que deseja deletar isso?');"> <button
                                            class="btn btn-danger mx-1">Excluir</button></a>
                                </div>
                            </div>
                        </td>
                    </tr>

                @endforeach


            </tbody>
        </table>



    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nova tarefa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('painel.tarefa.store') }}" method="POST">
                        @csrf
                        <div class="col-md-6 mt-3">
                            <label for="inputEmail4" class="form-label">Número do Processo</label>
                            <input type="text" class="form-control" id="inputEmail4">
                            <div class="mt-3 ">
                                <article>
                                    <span class="btn btn-primary"  onclick="mostrar('ma')">ESCOLHA UM MODELO</span>
                                    <div class="hidden" id="ma">

                                        <div class="input-group mt-3">
                                            <div class="form-outline">
                                                <input type="search" name="" id="" class="form-control busca"
                                                    placeholder="Pesquisar Modelos">
                                            </div>
                                            <button type="button" class="btn btn-busca">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>

                                        <div class="text-dep mt-3">
                                            <h1>DEPARTAMENTO</h1>
                                        </div>

                                        <div class="modelos">
                                            <div class="mt-3">
                                                <a href="#">legal e juridico</a>
                                            </div>
                                            <div class="mt-3">
                                                <a href="">processual</a>
                                            </div>
                                            <div class="mt-3">
                                                <a href="">consulting</a>
                                            </div>
                                            <div class="mt-3">
                                                <a href="">valorização de Ativo</a>
                                            </div>
                                            <div class="mt-3">
                                                <a href="">marketing</a>
                                            </div>
                                            <div class="mt-3">
                                                <a href="">financeiro</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="departamento">Departamento</label>
                            <select class="form-control " id="departamento">
                                <option selected>Escolha Departamento</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="datadehoje" class="form-label">Data do Pedido</label>
                            <input type="text" class="form-control" id="datadehoje">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="datadehoje1">Data limite</label>
                            <input type="text" class="form-control" id="datadehoje1">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="inputZip" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="morada">Morada</label>
                            <input class="form-control" type="text" id="morada">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="morada">Número da Porta</label>
                            <input class="form-control" type="text" id="morada">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="morada">Região</label>
                            <input class="form-control" type="text" id="morada">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="morada">Distrito</label>
                            <input class="form-control" type="text" id="morada">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="morada">Conselho</label>
                            <input class="form-control" type="text" id="morada">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="morada">Freguesia</label>
                            <input class="form-control" type="text" id="morada">
                        </div>
                        <div class="input-group mb-3 mt-3 col-md-6">
                            <input type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Anexo</label>
                        </div>
                        <div class="compartilhar d-flex ml-5 ">
                            <span>Compartilhar: </span>
                            <div class="form-check custom-radio ml-2  col-md-3">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">SIM</label>
                            </div>
                            <div class="form-check custom-radio ml-lg-2 col-md-3">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">NÃO</label>
                            </div>
                        </div>
                        <div class="botoes mt-5 ">
                            <button class="btn btn-primary">EDITAR TAREFA</button>
                            <button class="btn btn-success">ABRIR TAREFA</button>
                        </div>
                        <div class="modal-footer col-md-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
