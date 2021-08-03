@extends('layouts.painel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 my-1 d-none d-md-block"><h3 class="card-title"><b>Deslocações</b></h3></div>
                                <div class="col-12 col-sm-6 col-md-3 my-1 ml-auto">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="buscar">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Numero</th>
                                            <th scope="col">Km Inicio</th>
                                            <th scope="col">Data e Hora</th>
                                            <th scope="col">Km Fim</th>
                                            <th scope="col">Data e Hora</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assets as $asset)
                                            <tr>
                                                <th scope="row">{{ $asset->numero }}</th>
                                                <td>{{ $asset->kmini }}</td>
                                                <td>{{ $asset->created_at }}</td>
                                                <td>{{ $asset->kmfim }}</td>
                                                <td>{{ $asset->updated_at }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                        <button class="btn btn-primary mx-1 open" data-toggle="modal" data-id="{{ $asset->id }}" data-target="#edit"><i class="fas fa-edit"></i> Editar</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@component('asset.component.modal-edit')

@endcomponent

@endsection
