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
                                <div class="col-12 col-sm-6 col-md-6 my-1 ml-auto">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="search" name="name" class="form-control no-date {{!empty($_GET['coluna']) ? ($_GET['coluna'] == 'km_inicio_data' || $_GET['coluna'] == 'km_fim_data' ? 'd-none' : '') : ''}}" value="@isset($_GET['name']){{$_GET['name']}}@endisset" {{!empty($_GET['coluna']) ? ($_GET['coluna'] == 'km_inicio_data' || $_GET['coluna'] == 'km_fim_data' ? 'disabled' : '') : ''}} placeholder="buscar">
                                            <input type="text" name="name" class="form-control date-mask {{!empty($_GET['coluna']) ? ($_GET['coluna'] !== 'km_inicio_data' && $_GET['coluna'] !== 'km_fim_data' ? 'd-none' : '') : 'd-none'}}" value="@isset($_GET['name']){{$_GET['name']}}@endisset" placeholder="buscar" {{!empty($_GET['coluna']) ? ($_GET['coluna'] !== 'km_inicio_data' && $_GET['coluna'] !== 'km_fim_data' ? 'disabled' : '') : 'disabled'}}>
                                            <select name="coluna" class="form-control">
                                                <option value="numero" @isset($_GET['coluna']) @if($_GET['coluna'] == 'numero') selected @endif @endisset>Numero</option>
                                                <option value="km_inicio" @isset($_GET['coluna']) @if($_GET['coluna'] == 'km_inicio') selected @endif @endisset>KM Inicio</option>
                                                <option value="km_inicio_data" @isset($_GET['coluna']) @if($_GET['coluna'] == 'km_inicio_data') selected @endif @endisset>KM Inicio Data</option>
                                                <option value="km_fim" @isset($_GET['coluna']) @if($_GET['coluna'] == 'km_fim') selected @endif @endisset>KM Fim</option>
                                                <option value="km_fim_data" @isset($_GET['coluna']) @if($_GET['coluna'] == 'km_fim_data') selected @endif @endisset>KM Fim Data</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
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

                            @if (isset($_GET['name']))
                                {{ $assets->appends(['name' => $_GET['name'], 'coluna' => $_GET['coluna']])->links()  }}
                            @else
                                {{ $assets->links()  }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@component('asset.component.modal-edit')

@endcomponent

@endsection
