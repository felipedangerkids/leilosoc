@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 col-md-3 my-1">
                                    <h3 class="card-title"><b>Alterar Registro</b></h3>
                                </div>
                                <div class="col-6 col-md-3 my- ml-auto d-flex justify-content-end"><a
                                        href="{{ route('insolventes') }}" class="btn btn-primary"><i
                                            class="fas fa-arrow-left"></i> Voltar</a></div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="container">
                                <form action="{{ route('insolventes.update', $insolventes->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="user_id">Colaborador responsavel</label>
                                            <select class="select2 form-control" name="user_id" id="user_id">
                                                <option value="{{ $insolventes->responsavel->id ?? '0' }}">
                                                    {{ $insolventes->responsavel->name ?? 'Sem departamento' }}</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="inputEmail4" class="form-label">Nome do adm</label>
                                            <input name="name" type="text" class="form-control"
                                                value="{{ $insolventes->name }}" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="inputEmail4" class="form-label">Email do adm</label>
                                            <input name="email" value="{{$insolventes->email}}" type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="inputEmail4" class="form-label">NIF</label>
                                            <input name="nif" type="text" class="form-control"
                                                value="{{ $insolventes->nif }}" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="inputEmail4" class="form-label">Telemóvel</label>
                                            <input name="telemovel" type="text" class="form-control"
                                                value="{{ $insolventes->telemovel }}" id="inputEmail4">
                                        </div>

                                        <div class="form-group col-12"><h5>Morada:</h5></div>

                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Código Postal</label>
                                            <input type="text" class="form-control" id="ceping" value="{{ $insolventes->codigo_postal}}" name="codigo_postal">
                                        </div>
                                        <div style="margin-top: 32px;" class="form-group col-md-6">
                                            <button type="button" id="buscaring" class="btn btn-dark">Buscar</button>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1">Morada</label>
                                            <input type="text" id="morada" value="{{ $insolventes->morada}}" class="form-control" name="morada">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Região</label>
                                            <input type="text" id="regiao" value="{{ $insolventes->regiao}}" class="form-control" name="regiao">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Porta</label>
                                            <input type="text" id="porta" value="{{ $insolventes->porta}}" class="form-control" name="porta">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Distrito</label>
                                            <input type="text" id="distrito" value="{{ $insolventes->distrito}}" class="form-control" name="distrito">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Conselho</label>
                                            <input type="text" id="conselho" value="{{ $insolventes->conselho}}" class="form-control" name="conselho">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1">Freguesia</label>
                                            <input type="text" id="freguesia" value="{{ $insolventes->freguesia}}" class="form-control" name="freguesia">
                                        </div>

                                        <input type="hidden" id="latitude" name="latitude" value="{{ $insolventes->latitude}}">
                                        <input type="hidden" id="longitude" name="longitude" value="{{ $insolventes->longitude}}">

                                        <div class="col-md-12 mt-3 text-center mb-3">
                                            <label for="inputEmail4" class="form-label">Preferencial</label>
                                            <input name="preferencial" type="checkbox" class="form-control" id="inputEmail4" @if ($insolventes->preferencial == 'on')checked

                                            @endif>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                                Atualizar</button>
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
