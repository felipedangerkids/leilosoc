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
                            <div class="col-6 col-md-3 my- ml-auto d-flex justify-content-end"><a href="{{route('painel.users')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a></div>
                        </div>
                    </div>

                    <div class="card-body pad">
                      <div class="container">
                        <form action="{{ route('painel.users.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="row">
                              <div class="form-group col-12 col-md-6">
                                <label for="departamento_id">Departamento</label>
                                <select class="form-control" name="departamento_id" id="departamento_id">
                                    <option value="{{ $user->departamento->id ?? '0' }}">{{ $user->departamento->name ?? 'Sem departamento' }}</option>
                                    @foreach ($departamentos as $departamento)
                                      <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="form-group col-12 col-md-6">
                                <label for="escritorio_id">Escritório</label>
                                <select class="form-control" name="escritorio_id" id="escritorio_id">
                                    <option value="{{ $user->escritorio->id ?? '0' }}">{{ $user->escritorio->name ?? 'Sem escritório' }}</option>
                                    @foreach ($escritorios as $escritorio)
                                      <option value="{{ $escritorio->id }}">{{ $escritorio->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="form-group col-12 col-md-4">
                                <label for="name">Nome</label>
                                <input type="text" name="name" value="{{ $user->name }}"  class="form-control">
                              </div>
                              <div class="form-group col-12 col-md-4">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                              </div>
                              <div class="form-group col-12 col-md-4">
                                <label for="password">Senha</label>
                                <input type="password" name="password"  class="form-control">
                              </div>
                              <div class="form-group col-12 col-md-4">
                                <label for="exampleFormControlSelect1">Permissão</label>
                                <select class="form-control" name="permission" id="permissãoexampleFormControlSelect1">
                                    <option value="admin">Admin</option>
                                    <option value="user">Usuário</option>
                                </select>
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
