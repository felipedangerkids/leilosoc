@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="my-2">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Novo colaborador</button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    {{-- <th scope="col">Colaborador</th> --}}

                </tr>
            </thead>
            <tbody>
                @foreach ($colaboradores as $colaborador)
                <tr>
                    <th scope="row">{{ $colaborador->id }}</th>
                    {{-- <td>{{ $departamento->name }}</td> --}}
                </tr>

                @endforeach


            </tbody>
        </table>



    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Colaborador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('painel.colaborador.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Nome do Colaborador</label>
                              <input type="text" name="name"  class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
