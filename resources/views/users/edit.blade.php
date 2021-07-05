@extends('layouts.index')

@section('content')

<div class="container">
    <form action="{{ route('painel.users.update', $user->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleFormControlSelect1">Departamento</label>
            <select class="form-control" name="departamento_id" id="exampleFormControlSelect1">
                <option value="{{ $user->departamento->id ?? '0' }}">{{ $user->departamento->name ?? 'Sem departamento' }}</option>
                @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                @endforeach

            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" name="name" value="{{ $user->name }}"  class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Senha</label>
            <input type="password" name="password"  class="form-control">
          </div>
        <div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>

    </form>
</div>




@endsection
