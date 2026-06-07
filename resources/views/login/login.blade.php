@extends('base.layout')

@section('title', 'Login')

@push('styles')
    @vite(['resources/css/login.css', 'resources/css/animacaoFundo.css'])
@endpush

@section('content')
    <div class="animated-background">
        <div class="bg-grid-container">
            <div class="box-divider--light-all-2 box-background--blue animationRightLeft"
                style="grid-column: left-gutter / span 4; grid-row: top-gutter / span 4;"></div>
            <div class="box-divider--light-all-2 box-background--blue800 animationLeftRight"
                style="grid-column: left-gutter 2 / span 3; grid-row: top-gutter / span 2;"></div>
            <div class="box-divider--light-all-2 box-background--gray100 tans3s"
                style="grid-column: left-gutter / span 2; grid-row: 3 / span 3;"></div>
            <div class="box-divider--light-all-2 box-background--cyan200 tans4s"
                style="grid-column: left-gutter 2 / span 4; grid-row: 5 / span 3;"></div>
            <div class="box-divider--light-all-2 box-background--blue animationRightLeft"
                style="grid-column: 5 / span 3; grid-row: top-gutter / span 2;"></div>
            <div class="box-divider--light-all-2 box-background--white animationLeftRight"
                style="grid-column: 8 / span 2; grid-row: 3 / span 4;"></div>
            <div class="box-divider--light-all-2 box-background--blue800 tans3s"
                style="grid-column: 10 / span 3; grid-row: top-gutter / span 3;"></div>
            <div class="box-divider--light-all-2 box-background--gray100 animationRightLeft"
                style="grid-column: 13 / span 2; grid-row: 2 / span 3;"></div>
            <div class="box-divider--light-all-2 box-background--cyan200 tans4s"
                style="grid-column: 11 / span 2; grid-row: 5 / span 3;"></div>
            <div class="box-divider--light-all-2 box-background--blue animationLeftRight"
                style="grid-column: 14 / span 3; grid-row: top-gutter / span 2;"></div>
            <div class="box-divider--light-all-2 box-background--blue800 tans3s"
                style="grid-column: 15 / span 2; grid-row: 4 / span 3;"></div>
        </div>
    </div>
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
        <form action="{{ route('login') }}" method="POST">
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