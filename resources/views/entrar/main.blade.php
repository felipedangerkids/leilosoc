@extends('layouts.index')

@section('content')

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
                    <form>
                        <span class="input-group-text">Login</span>
                        <input type="text" aria-label="First name" class="form-control">
                    </form>
                </div>
                <div class="input-group mt-3">
                    <form>
                        <span class="input-group-text">Senha</span>
                        <input type="password" aria-label="First name" class="form-control">
                    </form>
                </div>
                <div class="mt-3 entrar">
                    <button class="btn btn-entrar">ENTRAR</button>
                </div>
            </div>
        </div>
    </div>

@endsection
