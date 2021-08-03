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
                            <div class="col-6 col-md-3 my- ml-auto d-flex justify-content-end"><a href="{{route('insolventes')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a></div>
                        </div>
                    </div>

                    <div class="card-body pad">
                      <div class="container">
                        <form action="{{ route('insolventes.update', $insolventes->id) }}" method="POST">
                            @csrf
                            <div class="row">
                              <div class="form-group col-12 col-md-6">
                                <label for="user_id">Colaborador responsavel</label>
                                <select class="form-control" name="user_id" id="user_id">
                                    <option value="{{ $insolventes->responsavel->id ?? '0' }}">{{ $insolventes->responsavel->name ?? 'Sem departamento' }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="form-group col-12 col-md-6">
                                <label for="inputEmail4" class="form-label">Nome do adm</label>
                                <input name="name" type="text" class="form-control" value="{{$insolventes->name}}" id="inputEmail4">
                              </div>
                              <div class="form-group col-12 col-md-4">
                                <label for="inputEmail4" class="form-label">NIF</label>
                                <input name="nif" type="text" class="form-control" value="{{$insolventes->nif}}" id="inputEmail4">
                              </div>
                              <div class="form-group col-12 col-md-4">
                                <label for="inputEmail4" class="form-label">Telemóvel</label>
                                <input name="telemovel" type="text" class="form-control" value="{{$insolventes->telemovel}}" id="inputEmail4">
                              </div>
                              <div class="col-12">
                                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
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