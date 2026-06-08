@extends('base.layout')

@section('title', 'Login')

@push('styles')
    @vite(['resources/css/login.css', 'resources/css/animacaoFundo.css'])
@endpush

@section('content')
    <div class="container-login">
        <div class="bem-vindo">
            <img src="{{ asset('img/foguete_branco.svg') }}" alt="">
            <h4>Bem-vindo de volta</h4>
            <span>Acesse sua conta para continuar</span>
        </div>

        @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data>
            @csrf
            <div class="email">
                <input type="text" name="email" id="email" required placeholder="">
                <label for="email">Email</label>
            </div>

            <div class="senha">
                <input type="password" id="senha" name="senha" required placeholder="">
                <label for="senha">Senha</label>
            </div>

            <div class="btn-login-container">
                <button type="submit" class="btn-login">Entrar</button>
                <a href="#" class="esqueciSenha">Esqueci a senha</a>
            </div>
        </form>

        <div class="cadastrar">
            <span>Não tem conta?</span>
            <a href="/cadastro">Cadastre-se</a>
        </div>
    </div>
@endsection