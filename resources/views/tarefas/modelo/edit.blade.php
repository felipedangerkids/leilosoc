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
                                <div class="col-6 col-md-3 my- ml-auto d-flex justify-content-end"><a href="{{route('modelos')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a></div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="container">
                                <form action="{{ route('modelos.update', $modelo->id) }}" method="POST">
                                    @csrf
                        
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Nome do Modelo</label>
                                                <input name="name" type="text" class="form-control" value="{{$modelo->name}}" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="categoria_id">Departamento</label>
                                                <select class="form-control" name="categoria_id" id="categoria_id">
                                                    <option value="{{ $modelo->departamento->id ?? '0' }}">{{ $modelo->departamento->name ?? 'Sem departamento' }}</option>
                                                    @foreach ($departamentos as $departamento)
                                                        <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                                    @endforeach
                                                </select>
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
