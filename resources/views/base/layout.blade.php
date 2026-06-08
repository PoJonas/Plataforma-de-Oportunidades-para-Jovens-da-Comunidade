<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>

    <nav class="nav-bar">
        <div class="oportunidades">
            <a href="{{ route('principal') }}">
                <img src="{{ asset('img/foguete_branco.svg') }}" alt="Logo Foguete" class="logo">
                Oportunidades
            </a>
        </div>

        <ul class="navegacao">
            <li><a href="#">Vagas</a></li>
            <li><a href="#">Cursos</a></li>
            <li><a href="#">Projetos</a></li>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="nav-mobile-extra"><a href="{{ route('login') }}">Entrar</a></li>
            <li class="nav-mobile-extra"><a href="{{ route('cadastro') }}">Cadastre-se</a></li>
        </ul>

        <div class="menu-direita">
            <a href="{{ route('login') }}" class="btn-entrar btn-desktop">
                <img src="{{ asset('img/icone-entrar.svg') }}" alt="Ícone Entrar">
                <span>Entrar</span>
            </a>

            <a href="{{ route('cadastro') }}" class="btn-cadastrar btn-desktop">
                <span>Cadastre-se</span>
            </a>

            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <a href="#principal">
                <img src="{{ asset('img/foguete_branco.svg') }}" alt="" class="logo-footer">
            </a>
            <span>Plataforma de oportunidades gratuita - 2026</span>
            <div class="contatos">
                <a href="#" target="_blank"><img src="{{ asset('img/instagram-icon-branco.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('img/whatsapp-icon-branco.svg') }}" alt=""></a>
            </div>
        </div>
    </footer>

</body>

</html>