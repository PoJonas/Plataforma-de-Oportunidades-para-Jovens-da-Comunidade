@extends('base.layout')

@section('title', 'Cadastro')

@push('styles')
    @vite(['resources/css/cadastro.css'])
    @vite(['resources/js/NavBar.js'])
@endpush

@section('content')
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

        <div class="btn-login-container">
            <button type="submit" class="btn-login">Cadastrar</button><br>
            <a href="{{ route('login') }}" class="redirect_login">Já tem conta? Faça login</a>
        </div>
    </form>

@endsection