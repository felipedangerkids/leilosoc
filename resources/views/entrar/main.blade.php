@extends('layouts.login')

@section('content')
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div class="d-flex">
            <div class="primeiro">
                <div class="logo">
                    <img src="{{ url('login/img/logo.png') }}" alt="">
                </div>
                <div class="textos">
                    <p class="text-1">JUNTOS <br> SOMOS</p>
                    <p class="text-2">MAIS <br> FORTES</p>
                </div>
            </div>
            <div class="segundo">
                <div class="login">
                    <div class="input-group mt-3">

                        <span class="input-group-text">E-mail</span>
                        <input type="text" aria-label="Email" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus class="form-control">

                    </div>
                    <div class="input-group mt-3">

                        <span class="input-group-text">Senha</span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password">

                    </div>
                    <div class="mt-3 entrar">
                        <button type="submit" class="btn btn-entrar">ENTRAR</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
