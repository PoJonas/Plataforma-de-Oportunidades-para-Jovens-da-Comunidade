@extends('base.layout')

@section('title', 'Criação de postagem')

@push('styles')
    @vite(['resources/css/cadastro.css', 'resources/css/animacaoFundo.css'])
@endpush

@section('content')
    <div class="qual_formulario">
        <form action="" method="GET">
            <label for="tipo_postagem">Selecione o tipo de postagem:</label>
            <select id="tipo_postagem" name="tipo_postagem" onchange="this.form.submit()">
                <option value="">--Selecione--</option>
                <option value="vaga"    {{ request('tipo_postagem') == 'vaga'    ? 'selected' : '' }}>Vaga</option>
                <option value="curso"   {{ request('tipo_postagem') == 'curso'   ? 'selected' : '' }}>Curso</option>
                <option value="evento"  {{ request('tipo_postagem') == 'evento'  ? 'selected' : '' }}>Evento</option>
            </select>
        </form>
    </div>

    <div class="container">

        @if(request('tipo_postagem') == 'vaga')

            <div class="form_vagas">
    <h1 class="titulo">Criar Postagem — Vaga</h1>

    <form action="{{ route('criarPost') }}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf

        <input type="hidden" name="tipo" value="1">

        {{-- Título --}}
        <div class="titulo_post">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" required>
        </div>

        {{-- Descrição --}}
        <div class="descricao">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" required>
        </div>

        {{-- Requisitos --}}
        <div class="requisitos">
            <label for="requisitos">Requisitos da vaga</label>
            <input type="text" name="requisitos" id="requisitos" required>
        </div>

        {{-- Regime — valores capitalizados para bater com o in: do controller --}}
        <div class="regime">
            <label for="regime">Tipo de regime</label>
            <select name="regime" id="regime" required>
                <option value="" disabled selected>Selecione</option>
                <option value="Presencial">Presencial</option>
                <option value="Remoto">Remoto</option>
                <option value="Hibrido">Híbrido</option>
            </select>
        </div>

        {{-- Tipo de contrato — name corrigido + valores alinhados --}}
        <div class="tipocontrato">
            <label for="tipo_contrato">Tipo de Contratação</label>
            <select name="tipo_contrato" id="tipo_contrato" required>
                <option value="" disabled selected>Selecione</option>
                <option value="CLT">CLT</option>
                <option value="PJ">PJ</option>
                <option value="Estágio">Estágio</option>
                <option value="A combinar">A combinar</option>
            </select>
        </div>

        {{-- Modalidade — valores completos --}}
        <div class="modalidade">
            <label for="modalidade">Modalidade</label>
            <select name="modalidade" id="modalidade" required>
                <option value="" disabled selected>Selecione</option>
                <option value="Tempo Integral">Tempo Integral</option>
                <option value="Meio Período">Meio Período</option>
                <option value="Horário Flexivel">Horário Flexível</option>
            </select>
        </div>

        {{-- Carga horária --}}
        <div class="carga_horaria">
            <label for="carga_horaria">Carga Horária Semanal</label>
            <input type="number" name="carga_horaria" id="carga_horaria" required>
        </div>

        {{-- Salário (opcional) --}}
        <div class="exibir_salario">
            <label for="exibir_salario">Deseja adicionar um salário à vaga?</label>
            <select id="exibir_salario" name="exibir_salario"
                    onchange="document.getElementById('campo_salario').style.display =
                              this.value === 'sim' ? 'block' : 'none'">
                <option value="nao">Não</option>
                <option value="sim">Sim</option>
            </select>
        </div>

        <div id="campo_salario" style="display: none;">
            <label for="salario">Salário</label>
            <input type="text" name="salario" id="salario">
        </div>

        {{-- Benefícios --}}
        <div class="beneficios">
            <label for="beneficios">Benefícios da vaga</label>
            <input type="text" name="beneficios" id="beneficios" required>
        </div>

        {{-- vaga_pcd como 0/1 para bater com in:0,1 no controller --}}
        <div class="para_pcd">
            <label for="vaga_pcd">Esta vaga é destinada a PCD ou minoria?</label>
            <select name="vaga_pcd" id="vaga_pcd"
                    onchange="document.getElementById('checkbox_pcd').style.display =
                              this.value === '1' ? 'block' : 'none'">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>

        {{-- tipo_pcd como radio (valor único) para bater com o campo string do banco --}}
        <div id="checkbox_pcd" style="display: none;">
            <label>Selecione o grupo:</label>
            <div><input type="radio" name="tipo_pcd" value="pcd"> Pessoa com Deficiência (PCD)</div>
            <div><input type="radio" name="tipo_pcd" value="preto_pardo"> Negro/Pardo</div>
            <div><input type="radio" name="tipo_pcd" value="lgbtqia+"> LGBTQIA+</div>
            <div><input type="radio" name="tipo_pcd" value="indigena"> Indígena</div>
            <div><input type="radio" name="tipo_pcd" value="mulher"> Mulher</div>
        </div>

        {{-- Imagem (opcional) --}}
        <div class="tem_imagem">
            <label for="tem_imagem">Deseja adicionar uma imagem?</label>
            <select id="tem_imagem" name="tem_imagem"
                    onchange="document.getElementById('campo_imagem').style.display =
                              this.value === 'sim' ? 'block' : 'none'">
                <option value="nao">Não</option>
                <option value="sim">Sim</option>
            </select>
        </div>

        <div id="campo_imagem" style="display: none;">
            <label for="imagem">Anexe sua imagem</label>
            <input type="file" name="imagem" id="imagem" accept="image/*">
        </div>

        <div class="btn-cadastrar-container">
            <button type="submit" class="btn-cadastro">Cadastrar</button>
        </div>

    </form>
    </div>

        @elseif(request('tipo_postagem') == 'curso')
            <div class="form_curso">
                <h1 class="titulo">Criar Postagem — Curso</h1>

                <form action="{{ route('criarPost') }}" method="POST" enctype="multipart/form-data">
                    @if ($errors->any())
                        <div style="color: red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf

                    <input type="hidden" name="tipo" value="2">

                    <div class="titulo_post">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" required placeholder="">    
                    </div>

                    <div class="descricao">
                        <label for="nome">Descrição</label>
                        <input type="text" name="descricao" id="descricao" required placeholder="">
                    </div>

                    <div class="instituicao_responsavel">
                        <label for="titulo">instituicao</label>
                        <input type="text" name="instituicao_responsavel" id="instituicao_responsavel" required placeholder="">    
                    </div>

                    <div class="carga_horaria">
                        <label for="nome">Carga horária</label>
                        <input type="number" name="carga_horaria" id="carga_horaria" required placeholder="">
                    </div>

                    <div class="turno">
                        <label for="turno">turno</label>
                        <select id="turno" name="turno">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Noturno">Noturno</option>
                        </select>
                    </div>

                    <div class="gratuito">
                        <label for="gratuito">O curso será gratuito?</label>
                        <select id="is_gratuito" name="is_gratuito" onchange="togglePreco(this.value)">
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>

                    <div class="preco" id="campo_preco" style="display: none;">
                        <label for="valor">Digite o valor de inscrição</label>
                        <input type="text" name="preco" id="valor" placeholder="">
                    </div>

                    <script>
                        function togglePreco(valor) {
                            const campo = document.getElementById('campo_preco');
                            campo.style.display = valor === '0' ? 'block' : 'none';
                        }
                    </script>

                    <div class="possui_certificado">
                        <label for="certificado">O curso terá certificado?</label>
                        <select id="possui_certificado" name="possui_certificado">
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>

                    <div class="pre_requisitos">
                        <label for="pre_requisitos">Pré-requisitos para se inscrever no curso</label>
                        <input type="text" name="pre_requisitos" id="pre_requisitos" required placeholder="">
                    </div>

                    <div class="limite_vagas">
                        <label for="titulo">Limite de vagas ofertadas</label>
                        <input type="number" name="limite_vagas" id="limite_vagas" required placeholder="">    
                    </div>

                    <div class="data_inicio">
                        <label for="data_inicio">Digite a data de inicio do curso</label>
                        <input type="date" name="data_inicio" id="data_inicio" placeholder="">
                    </div>

                    <div class="data_fim">
                        <label for="data_fim">Digite a data de previsão de término do curso</label>
                        <input type="date" name="data_fim" id="data_fim" placeholder="">
                    </div>

                    <div class="tem_imagem">
                        <label for="tem_imagem">Deseja Adicionar uma imagem junto à vaga?</label>
                        <select id="tem_imagem" name="tem_imagem" onchange="toggleImagem(this.value)">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>

                    <div class="imagem" id="campo_imagem" style="display: none;">
                        <label for="imagem">Anexe sua imagem</label>
                        <input type="file" name="imagem" id="imagem" accept="image/*">
                    </div>

                    <script>
                        function toggleImagem(valor) {
                            const campo = document.getElementById('campo_imagem');
                            campo.style.display = valor === '1' ? 'block' : 'none';
                        }
                    </script>

                    <div class="btn-cadastrar-container">
                        <button type="submit" class="btn-cadastro">Cadastrar</button>
                    </div>

                </form>
            </div>

        @elseif(request('tipo_postagem') == 'evento')
            <div class="form_evento">
                <h1 class="titulo">Criar Postagem — Evento</h1>
                <form action="{{ route('criarPost') }}" method="POST" enctype="multipart/form-data">
                    @if ($errors->any())
                        <div style="color: red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf

                    <input type="hidden" name="tipo" value="3">

                    <div class="titulo_post">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" required placeholder="">    
                    </div>

                    <div class="descricao">
                        <label for="nome">Descrição</label>
                        <input type="text" name="descricao" id="descricao" required placeholder="">
                    </div>

                    <div class="organizacao">
                        <label for="organizacao_responsavel">Organização responsável</label>
                        <input type="text" name="organizacao_responsavel" id="organizacao_responsavel" required>
                    </div>

                    <div class="local">
                        <label for="local">Local do evento</label>
                        <input type="text" name="local" id="local" required placeholder="">
                    </div>

                    <div class="checkbox_publico_alvo">
                        <label>Público alvo do evento</label>
                        <div class="campo-checkbox">
                            <input type="checkbox" name="publico_alvo[]" value="crianca">
                            <label>Crianças</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" name="publico_alvo[]" value="adulto">
                            <label>Adultos</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" name="publico_alvo[]" value="idoso">
                            <label>Idosos</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" name="publico_alvo[]" value="estudante"> {{-- ✅ corrigido --}}
                            <label>Estudantes</label>
                        </div>
                    </div>

                    <div class="gratuito">
                        <label for="is_gratuito">O evento será gratuito?</label>
                        <select id="is_gratuito" name="is_gratuito" onchange="togglePreco(this.value)">
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>

                    <div class="preco" id="campo_preco" style="display: none;">
                        <label for="valor">Digite o valor de inscrição</label>
                        <input type="number" name="valor" id="valor" placeholder="">
                    </div>

                    <script>
                        function togglePreco(valor) {
                            const campo = document.getElementById('campo_preco');
                            campo.style.display = valor === '0' ? 'block' : 'none';
                        }
                    </script>             

                    <div class="data_inicio">
                        <label for="data_inicio">Digite a data de inicio do curso</label>
                        <input type="date" name="data_inicio" id="data_inicio" placeholder="">
                    </div>

                    <div class="data_fim">
                        <label for="data_fim">Digite a data de previsão de término do curso</label>
                        <input type="date" name="data_fim" id="data_fim" placeholder="">
                    </div>

                    <div class="hora_inicio">
                        <label for="hora_inicio">Digite a hora de inicio do evento</label>
                        <input type="time" name="hora_inicio" id="hora_inicio" placeholder="">
                    </div>

                    <div class="hora_fim">
                        <label for="hora_fim">Digite a hora de término do evento</label>
                        <input type="time" name="hora_fim" id="hora_fim" placeholder="">
                    </div>

                    <div class="limite_vagas">
                        <label for="titulo">Limite de vagas ofertadas</label>
                        <input type="number" name="limite_vagas" id="limite_vagas" required placeholder="">    
                    </div>

                    <div class="tem_imagem">
                        <label for="tem_imagem">Deseja Adicionar uma imagem junto à vaga?</label>
                        <select id="tem_imagem" name="tem_imagem" onchange="toggleImagem(this.value)">
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>
                    </div>

                    <div class="imagem" id="campo_imagem" style="display: none;">
                        <label for="imagem">Anexe sua imagem</label>
                        <input type="file" name="imagem" id="imagem" accept="image/*">
                    </div>

                    <script>
                        function toggleImagem(valor) {
                            const campo = document.getElementById('campo_imagem');
                            campo.style.display = valor === 'sim' ? 'block' : 'none';
                        }
                    </script>

                    <div class="btn-cadastrar-container">
                        <button type="submit" class="btn-cadastro">Cadastrar</button>
                    </div>
                    
                </form>
            </div>

        @endif
    </div>

@endsection