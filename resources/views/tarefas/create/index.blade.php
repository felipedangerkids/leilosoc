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
                    <th scope="col">Numero da tarefa</th>
                    <th scope="col">Data de conclusão</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Ações

                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                    <tr>
                        <th scope="row">{{ $tarefa->name }}</th>
                        <td>{{ $tarefa->fim }}</td>
                        <td>{{ $tarefa->modelo }}</td>
                        <td>
                            <div class="d-flex">
                                <div>
                                    <a href="{{ route('calendario') }}"><button class="btn btn-sm btn-dark mx-1">Ver no
                                            Calendário</button></a>
                                </div>
                                <div>
                                    <a href=""><button class="btn btn-sm btn-primary mx-1">Editar</button></a>
                                </div>
                                <div>
                                    <a href="" onclick="return confirm('Você tem certeza que deseja deletar isso?');">
                                        <button class="btn btn-sm btn-danger mx-1">Excluir</button></a>
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
                    <form class="row g-3" action="{{ route('painel.tarefas.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6 mt-3">
                            <label for="inputEmail4" class="form-label">Número do Processo</label>
                            <input name="name" type="text" value="{{ $processo->processo ?? '' }} " class="form-control"
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
                                                                <button class="btn btn-link btn-block text-left"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse-{{ $categoria->id }}"
                                                                    aria-expanded="true"
                                                                    aria-controls="collapse-{{ $categoria->id }}">
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
                                                                            <input class="form-check-input"
                                                                                value="{{ $modelo->name }}" type="radio"
                                                                                name="modelo" id="exampleRadios1">
                                                                            <label class="form-check-label"
                                                                                for="exampleRadios1">
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
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                rows="5"></textarea>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="departamento">Departamento</label>
                            <select class="form-control " name="departamento_id" id="departamento">
                                <option selected>Escolha Departamento</option>
                                @foreach ($departamentos as $departamento)

                                    <option value="{{ $departamento->id }}" @if ( ($insolente->responsavel->departamento_id ?? '') == $departamento->id )
                                        selected
                                    @endif>{{ $departamento->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="departamento">Colaborador(a)</label>
                            <select class="form-control " name="user_id" id="departamento">

                                <option selected>Escolha Colaborador(a)</option>
                                @foreach ($users as $user)

                                    <option value="{{ $user->id }}" @if ($insolente->responsavel->id == $user->id)
                                    selected
                                    @endif>{{ $user->name }}</option>
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
                                <input name="compartilhar" class="form-check-input" type="radio" id="inlineRadio1"
                                    value="sim">
                                <label class="form-check-label" for="inlineRadio1">SIM</label>
                            </div>
                            <div class="form-check custom-radio ml-lg-2 col-md-3">
                                <input class="form-check-input" type="radio" name="compartilhar" id="inlineRadio2"
                                    value="nao">
                                <label class="form-check-label" for="inlineRadio2">NÃO</label>
                            </div>
                        </div>
                        <div class="botoes my-5 ">

                            <button type="submit" class="btn btn-success">ABRIR TAREFA</button>
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
