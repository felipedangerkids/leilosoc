@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block"><h3 class="card-title"><b>Administradores</b></h3></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i> Novo Desinvestimento</button></div>
                                <div class="col-12 col-sm-6 col-md-6 my-1 ml-auto">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="search" name="name" class="form-control" value="@isset($_GET['name']){{$_GET['name']}}@endisset" placeholder="buscar">
                                            <select name="coluna" class="form-control">
                                                <option value="name" @isset($_GET['coluna']) @if($_GET['coluna'] == 'name') selected @endif @endisset>Desinvestimento</option>
                                                <option value="responsavel" @isset($_GET['coluna']) @if($_GET['coluna'] == 'responsavel') selected @endif @endisset>Responsavel</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Desinvestimento</th>
                                            <th scope="col">Responsavel</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($desinvestimentos as $desinvestimento)
                                            <tr>
                                                <th scope="row">{{ $desinvestimento->id }}</th>
                                                <td>{{ $desinvestimento->name }}</td>
                                                <td>{{ $desinvestimento->responsavel->name ?? '' }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{route('insolventes.edit', $desinvestimento->id)}}"><button class="btn btn-primary mx-1"><i class="fas fa-edit"></i> Editar</button></a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('insolventes.delete', $desinvestimento->id) }}" onclick="return confirm('Você tem certeza que deseja deletar isso?');"><button class="btn btn-danger mx-1"><i class="fas fa-trash"></i> Excluir</button></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @if (isset($_GET['name']))
                                {{ $desinvestimentos->appends(['name' => $_GET['name'], 'coluna' => $_GET['coluna']])->links()  }}
                            @else
                                {{ $desinvestimentos->links()  }}
                            @endif
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
                    <h5 class="modal-title" id="staticBackdropLabel">Novo Desinvestimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('desinvestimentos.post') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect1">Colaborador responsavel</label>
                            <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="inputEmail4" class="form-label">Desinvestimento</label>
                            <input name="name" type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="inputEmail4" class="form-label">NIF</label>
                            <input name="nif" type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="inputEmail4" class="form-label">Telemóvel</label>
                            <input name="telemovel" type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="modal-footer col-md-12 justify-content-between">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cadastrar Desinvestimento</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
