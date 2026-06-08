@extends('base.layout')

@section('title', 'Cadastro')

@push('styles')
    @vite(['resources/css/cadastro.css', 'resources/css/animacaoFundo.css'])
@endpush

@section('content')
    <div class="container-cadastro">
        <div class="cadastro-txt">
            <img src="{{ asset('img/foguete_branco.svg') }}" alt="">
            <Span>Criar conta</Span>
        </div>
        <form action="{{ route('cadastro') }}" method="POST" enctype="multipart/form-data>
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