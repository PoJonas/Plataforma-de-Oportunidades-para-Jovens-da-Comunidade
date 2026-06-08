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
            <span>Candidaturas ativas</span>
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
            <h2>Minhas candidaturas</h2>
            @if($listaVagas->isEmpty())
                <div>
                    <p>Você ainda não se candidatou a nenhuma vaga.</p>
                    {{-- colocar o link --}}
                    <a href="#">Encontrar vagas</a>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Vaga</th>
                            <th>Modalidade</th>
                            <th>Data da candidatura</th>
                            <th>Carga Horária</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listaVagas as $v)
                            <tr>
                                <td>{{ $v->titulo }}</td>
                                <td>{{ $v->regime }}</td>
                                <td>{{ $v->created_at->format('d/m/y') }}</td>
                                <td>{{ $v->carga_horaria }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="meus-cursos">
            <h2>Meus cursos</h2>
            @if ($listaCursos->isEmpty())
                <div>
                    <p>Você ainda não se matriculou em nenhum curso.</p>
                    <p>Capacite-se para o mercado de trabalho. Inscreva-se em nossos cursos gratuitos para melhorar seu
                        currículo.</p>
                    {{-- colocar o link --}}
                    <a href="#">Buscar cursos</a>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Carga Horária</th>
                            <th>Turno</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listaCursos as $c)
                            <tr>
                                <td>{{ $c->titulo }}</td>
                                <td>{{ $c->carga_horaria }}</td>
                                <td>{{ $c->turno }}</td>
                                <td>
                                    @if ($c->status)
                                        <span>Concluído</span>
                                    @else
                                        <span>Em andamento</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>

    {{-- Vaga Empresa Data da Candidatura Status --}}
</body>

</html>