<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/dashboard.css', 'resources/js/NavBar.js'])
</head>

<body>
    <nav>
        <a href="">Visão Geral</a>
        <a href="">Minhas vagas</a>
        <a href="">Meus cursos</a>
        <a href="">Meus projetos</a>
        <a href="{{ route('criarPost') }}">Criar um novo anúncio</a>
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

        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
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
        </div>

        <div class="abas-navegacao" style="margin-bottom: 20px;">
            <button id="btn-candidaturas" onclick="mudarAba('candidaturas')"> Minhas Candidaturas </button>

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
                    <p>Capacite-se para o mercado de trabalho. Inscreva-se em nossos cursos gratuitos para melhorar seu
                        currículo.</p>
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
    </main>

    <script>
        function mudarAba(abaNome) {
            const abaCandidaturas = document.getElementById('aba-candidaturas');
            const abaCursos = document.getElementById('aba-cursos');
            const abaProjetos = document.getElementById('aba-projetos');
            const btnCandidaturas = document.getElementById('btn-candidaturas');
            const btnCursos = document.getElementById('btn-cursos');
            const btnProjeto = document.getElementById('btn-projetos');
        

            if (abaNome === 'candidaturas') {
                abaCandidaturas.style.display = 'block';
                abaCursos.style.display = 'none';
                btnCandidaturas.style.color = '#2563eb';
                btnCandidaturas.style.fontWeight = 'bold';
                btnCursos.style.color = '#64748b';
                btnCursos.style.fontWeight = 'normal';
                btnProjeto.style.color = '#64748b';
                btnProjeto.style.fontWeight = 'normal';

            } else if (abaNome === 'cursos') {
                abaProjetos.style.display = 'none'
                abaCandidaturas.style.display = 'none';
                abaCursos.style.display = 'block';
                btnCandidaturas.style.color = '#64748b';
                btnCandidaturas.style.fontWeight = 'normal';
                btnCursos.style.color = '#2563eb';
                btnCursos.style.fontWeight = 'bold';
                btnProjeto.style.color = '#64748b';
                btnProjeto.style.fontWeight = 'normal';

            } else if (abaNome === 'projetos') {
                abaProjetos.style.display = 'block'
                abaCandidaturas.style.display = 'none';
                abaCursos.style.display = 'none';
                btnCandidaturas.style.color = '#64748b';
                btnCandidaturas.style.fontWeight = 'normal';
                btnCursos.style.color = '#64748b';
                btnCursos.style.fontWeight = 'normal';
                btnProjeto.style.color = '#2563eb';
            }

        }
    </script>

</body>

</html>