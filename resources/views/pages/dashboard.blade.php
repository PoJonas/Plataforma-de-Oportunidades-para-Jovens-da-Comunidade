<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/dashboard.css', 'resources/js/NavBar.js'])
</head>

<body>
    <nav class="container">
        <div class="navegacao">
            <img src="{{ asset('img/foguete_branco.svg') }}" alt="">
            <h2>Meu Painel</h2>
            <hr>
            <a href="">Visão Geral</a>
            <a href="">Minhas vagas</a>
            <a href="">Meus cursos</a>
            <a href="">Meus projetos</a>
            <a href="{{ route('criarPost') }}">+ Criar um novo anúncio</a>
            <a href="">Configurações</a>
        </div>
        <div>

            <div class="logout">
                <h2>{{ ucfirst(strtolower($usuario->nome)) }}</h2>
                <span>{{ $cargo }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout"><img src="{{ asset('img/saida_rosa.svg') }}" alt="">Sair</button>
                </form>
            </div>
    </nav>

    <main>
        <div class="container-bemvindo">
            <div class="bem-vindo">
                <h1>Bem vindo, {{ ucfirst(strtolower($usuario->nome)) }}!</h1>
                <span>Aqui está o resumo das suas atividades e oportunidades recentes.</span>
                <hr>
            </div>
            <div class="cards">
                <div class="candidaturas-ativas">
                    <img src="{{ asset('img/vagas-de-emprego.svg') }}" alt="">
                    <span>Candidaturas ativas</span>
                    <span>{{ $vagas }}</span>
                </div>
                <div class="cursos-andamento">
                    <img src="{{ asset('img/cursos-profissionais.svg') }}" alt="">
                    <span>Cursos em andamento</span>
                    <span>{{ $cursosAndamento }}</span>
                </div>
                <div class="proximos-projetos">
                    <img src="{{ asset('img/projetos-sociais.svg') }}" alt="">
                    <span>Próximos projetos</span>
                    <span>{{ $projeto }}</span>
                </div>
            </div>
        </div>
        <div class="container-candidaturas">
            <div class="abas-navegacao">
                <button id="btn-candidaturas" class="ativo" onclick="mudarAba('candidaturas')"> Minhas Candidaturas </button>

                <button id="btn-cursos" onclick="mudarAba('cursos')"> Meus Cursos </button>

                <button id="btn-projetos" onclick="mudarAba('projetos')"> Meus projetos </button>
            </div>

            <div id="aba-candidaturas" class="candidaturas">
                <h2>Minhas candidaturas</h2>
                @if($listaVagas->isEmpty())
                    <div>
                        <p>Você ainda não se candidatou a nenhuma vaga.</p>
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

            <div id="aba-cursos" class="meus-cursos" style="display: none;">
                <h2>Meus cursos</h2>
                @if ($listaCursos->isEmpty())
                    <div>
                        <p>Você ainda não se matriculou em nenhum curso.</p>
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

            <div id="aba-projetos" class="projetos" style="display: none;">
                <h2>Projetos</h2>
                @if ($listarProjetos->isEmpty())
                    <div>
                        <p>Você ainda não participou de nenhum projeto.</p>
                        <a href="#">Buscar projetos</a>
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
                            @foreach ($listarProjetos as $p)
                                <tr>
                                    <td>{{ $p->titulo }}</td>
                                    <td>{{ $p->carga_horaria }}</td>
                                    <td>{{ $p->turno }}</td>
                                    <td>
                                        @if ($p->status)
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
        </div>
    </main>

    <script>
        function mudarAba(abaNome) {
            const abaCandidaturas = document.getElementById('aba-candidaturas');
            const abaCursos = document.getElementById('aba-cursos');
            const abaProjetos = document.getElementById('aba-projetos');

            document.querySelectorAll('.abas-navegacao button').forEach(btn => {
                btn.classList.remove('ativo');
            });

            document.getElementById('btn-' + abaNome).classList.add('ativo');

            if (abaNome === 'candidaturas') {
                abaCandidaturas.style.display = 'flex';
                abaCursos.style.display = 'none';
                abaProjetos.style.display = 'none';

            } else if (abaNome === 'cursos') {
                abaCandidaturas.style.display = 'none';
                abaCursos.style.display = 'flex';
                abaProjetos.style.display = 'none';

            } else if (abaNome === 'projetos') {
                abaCandidaturas.style.display = 'none';
                abaCursos.style.display = 'none';
                abaProjetos.style.display = 'flex';
            }
        }
    </script>

</body>

</html>