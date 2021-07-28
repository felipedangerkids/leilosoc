@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="d-flex">
            <div class="my-2">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#assets">Criar
                    Novo asset</button>
            </div>

        </div>
        <table class="table">
            <thead class="thead-dark">
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
                                  <button class="btn btn-primary mx-1 open" data-toggle="modal" data-id="{{ $asset->id }}" data-target="#edit">Editar</button>
                                </div>

                            </div>
                        </td>
                    </tr>

                @endforeach


            </tbody>
        </table>



    </div>



    <div class="modal fade" id="assets" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Novo assets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('assets.post') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mt-3">
                            <label for="inputEmail4" class="form-label">Numero do Processo</label>
                            <input name="numero" type="text" value="{{ $processo->processo ?? '' }}" class="form-control"
                                id="inputEmail4">
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="col-md-12 mt-3">
                            <label for="inputEmail4" class="form-label">Km Inicial</label>
                            <input name="kmini" type="text" class="form-control" id="inputEmail4">
                        </div>

                        <div class="botoes my-5 ">

                            <button type="submit" class="btn btn-success">SALVAR</button>
                        </div>
                        <div class="modal-footer col-md-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@component('asset.component.modal-edit')

@endcomponent





@endsection
