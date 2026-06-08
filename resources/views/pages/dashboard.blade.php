<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <nav>
        <a href="">Visão Geral</a>
        <a href="">Minhas vagas</a>
        <a href="">Meus cursos</a>
        <a href="">Meus projetos</a>
        <a href="">Configurações</a>

        <h2>{{ $usuario->nome }}</h2>
        <span>{{ $cargo }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </nav>

    <main>
        <h1>Bem vindo, {{ $usuario->nome }}</h1>
        <div>
            <span>Candidatura ativas</span>
            <span>{{ $vagas }}</span>
        </div>
        <div>
            <span>Cursos em andamento</span>
            <span>{{ $cursosAndamento }}</span>
        </div>
        <div>
            <span>Próximos projetos</span>
            <span>{{ $projeto }}</span>
        </div>

        <div class="candidaturas">
            
        </div>

        <div class="meus-cursos">

        </div>
    </main>


</body>

</html>