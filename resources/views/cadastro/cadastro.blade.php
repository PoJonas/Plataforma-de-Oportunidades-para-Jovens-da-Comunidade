@extends('base.layout')

@section('title', 'Cadastro')

@push('styles')
    @vite(['resources/css/cadastro.css', 'resources/css/animacaoFundo.css'])
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
    <div class="container-cadastro">
        <div class="cadastro-txt">
            <img src="{{ asset('img/foguete_branco.svg') }}" alt="">
            <Span>Criar conta</Span>
        </div>
        <form action="{{ route('cadastro') }}" method="POST">
            @csrf
            <div class="nome">
                <input type="text" name="nome" id="nome" required placeholder="">
                <label for="nome">Nome</label>
            </div>

            <div class="identificacao">
                <input type="text" name="cpf_cnpj" id="cpf_cnpj" required placeholder="">
                <label for="cpf_cnpj">CPF ou CNPJ</label>
            </div>

            <div class="email">
                <input type="text" name="email" id="email" required placeholder="">
                <label for="email">Email</label>
            </div>

            <div class="senha">
                <input type="password" name="senha" id="senha" required placeholder="">
                <label for="senha">Senha</label>
            </div>

            <div class="telefone">
                <input type="text" name="telefone" id="telefone" required placeholder="">
                <label for="telefone">Telefone</label>
            </div>

            <div class="btn-cadastrar-container">
                <button type="submit" class="btn-cadastro">Cadastrar</button><br>
            </div>
            <div class="redirect_login">
                <span>Já tem conta?</span>
                <a href="{{ route('login') }}"> Faça login</a>
            </div>
        </form>
    </div>

@endsection