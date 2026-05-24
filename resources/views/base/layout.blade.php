<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meu Site')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="nav-bar">
        <div class="oportunidades">
            <img src="{{ asset('img/logo-foguete.svg') }}" alt="Logo Foguete" class="logo">
            <span>Oportunidades</span>
        </div>
        
        <ul class="navegacao">
            <li><a href="#">Vagas</a></li>
            <li><a href="#">Cursos</a></li>
            <li><a href="#">Projetos</a></li>
            <li><a href="#">Dashboard</a></li>
        </ul>
        
        <div class="menu-direita">
            <a href="#" class="btn-entrar">
                <img src="{{asset('img/icone-entrar.svg')}}" alt="Ícone Entrar">
                <span>Entrar</span>
            </a>
            
            <button class="hamburger">&#9776;</button>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>

    </footer>
</body>

</html>