@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 col-md-3 my-1"><h3 class="card-title"><b>Alterar Registro</b></h3></div>
                                <div class="col-6 col-md-3 my- ml-auto d-flex justify-content-end"><a href="{{route('painel.departamento')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a></div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="container">
                                <form action="{{ route('painel.departamento.update', $departamento->id) }}" method="POST">
                                    @csrf

                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome do Departamento</label>
                                                <input type="text" name="name" value="{{ $departamento->name }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cor do Departamento</label>
                                                <input type="color" name="color" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
                                            </div>
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
