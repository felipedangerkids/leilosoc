@extends('layouts.index')

@section('content')
    <div class="container">
        <form action="{{ route('citrus.store') }}" method="POST">
            @csrf
            <div class="row pb-3">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Tribunal</label>
                    <input type="text" name="tribunal" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Ato</label>
                    <input type="text" name="ato" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Referência</label>
                    <input type="text" name="referencia" class="form-control">
                </div>
                <div class="form-group col-md-9">
                    <label for="exampleInputEmail1">Processo</label>
                    <input type="text" name="processo" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Espécie</label>
                    <input type="text" name="especie" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Data</label>
                    <input type="text" name="data" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Data da propositura da ação</label>
                    <input type="text" name="data_propositura" class="form-control">
                </div>
                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1">Insolvente</label>
                    <input type="text" name="insolvente" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">NIF/NIPC</label>
                    <input type="text" name="nif" class="form-control">
                </div>
                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1 ">Administrador Insolvência</label>
                    <input type="text" name="adm_insolvencia" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">NIF/NIPC</label>
                    <input type="text" name="nif_adm" class="form-control">
                </div>
                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1 ">Credor</label>
                    <input type="text" name="credor" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">NIF/NIPC</label>
                    <input type="text" name="nif_credor" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
