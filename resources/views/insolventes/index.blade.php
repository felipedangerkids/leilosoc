@extends('layouts.painel')

@section('content')

    <div class="container">
        <div class="d-flex">
            <div class="my-2">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Criar
                    Novo AI</button>
            </div>

        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">AI</th>
                    <th scope="col">Responsavel</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($insolventes as $insolvente)
                    <tr>
                        <th scope="row">{{ $insolvente->id }}</th>
                        <td>{{ $insolvente->name }}</td>
                        <td>{{ $insolvente->responsavel->name }}</td>
                        <td>
                            <div class="d-flex">
                                <div>
                                    <a href=""><button class="btn btn-primary mx-1">Editar</button></a>
                                </div>
                                <div>
                                    <a href="" onclick="return confirm('Você tem certeza que deseja deletar isso?');">
                                        <button class="btn btn-danger mx-1">Excluir</button></a>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Novo AI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('insolventes.post') }}" method="POST">
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
                            <label for="inputEmail4" class="form-label">Nome do adm</label>
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
                        <div class="botoes my-5 ">
                            <button type="submit" class="btn btn-success">Cadastrar AI</button>
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
