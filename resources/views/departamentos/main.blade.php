@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block"><h3 class="card-title"><b>Departamentos</b></h3></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i> Novo Departamento</button></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1 ml-auto">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="buscar">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Departamento</th>
                                            <th scope="col">Cor</th>
                                            <th scope="col">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departamentos as $departamento)
                                            <tr>
                                                <th scope="row">{{ $departamento->id }}</th>
                                                <td>{{ $departamento->name }}</td>
                                                <td width="10" height="10" style="background: {{ $departamento->color }};"></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{ route('painel.departamento.edit', $departamento->id) }}"><button class="btn btn-primary mx-1"><i class="fas fa-edit"></i> Editar</button></a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('painel.departamento.delete', $departamento->id) }}" onclick="return confirm('Você tem certeza que deseja deletar isso?');"> <button class="btn btn-danger mx-1"><i class="fas fa-trash"></i> Excluir</button></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('painel.departamento.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome do Departamento</label>
                            <input type="text" name="name"  class="form-control" placeholder="Digite o Departamento">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cor do Departamento</label>
                            <input type="color" name="color"  class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
