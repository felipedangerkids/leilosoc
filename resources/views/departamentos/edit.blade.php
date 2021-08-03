@extends('layouts.painel')

@section('content')
    <div class="container">
        <form action="{{ route('painel.departamento.update', $departamento->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Nome do Departamento</label>
                <input type="text" name="name" value="{{ $departamento->name }}" class="form-control">
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>

        </form>
    </div>


@endsection
