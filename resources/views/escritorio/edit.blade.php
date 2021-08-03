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
                                <div class="col-6 col-md-3 my- ml-auto d-flex justify-content-end"><a href="{{route('escritorio')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a></div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="container">
                                <form action="{{ route('escritorio.update', $escritorio->id) }}" method="POST">
                                    @csrf
                        
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nome do Escritorio</label>
                                                <input type="text" name="name" value="{{ $escritorio->name }}" class="form-control">
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
