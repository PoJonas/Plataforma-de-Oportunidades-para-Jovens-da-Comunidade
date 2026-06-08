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
                    @csrf
                    <div class="titulo_post">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" required placeholder="">    
                    </div>

                    <div class="descricao">
                        <label for="nome">Descrição</label>
                        <input type="text" name="descricao" id="descricao" required placeholder="">
                    </div>

                    <div class="requisitos">
                        <label for="requisitos">Requisitos da vaga</label>
                        <input type="text" name="requisitos" id="requisitos" required placeholder="">
                    </div>

                    <div class="regime">
                        <label for="regime">Tipo de regime</label>
                        <select id="regime" name="regime">
                            <option value="" disabled selected>Selecione</option>
                            <option value="presencial">Presencial</option>
                            <option value="remoto">Remoto</option>
                            <option value="hibrido">Híbrido</option>
                        </select>
                    </div>

                    <div class="tipocontrato">
                        <label for="tipocontrato">Tipo de Contratação</label>
                        <select id="tipocontrato" name="tipocontrato">
                            <option value="" disabled selected>Selecione</option>
                            <option value="clt">CLT</option>
                            <option value="pj">PJ</option>
                            <option value="estagio">Estágio</option>
                            <option value="free_lancer">Free Lancer</option>
                            <option value="a_combinar">A combinar</option>
                        </select>
                    </div>
                    
                    <div class="modalidade">
                        <label for="modalidade">Modalidade</label>
                        <select id="modalidade" name="modalidade">
                            <option value="" disabled selected>Selecione</option>
                            <option value="integral">Tempo Integral</option>
                            <option value="meio_periodo">Meio Período</option>
                            <option value="flexivel">Horário FLexivel</option>
                        </select>
                    </div>

                    <div class="carga_horaria">
                        <label for="carga_horaria">Carga Horária Semanal</label>
                        <input type="number" name="carga_horaria" id="carga_horaria" required placeholder="">   
                    </div>

                    <div class="exibir_salario">
                        <label for="exibir_salario">Deseja Adicionar um Salário à vaga?</label>
                        <select id="exibir_salario" name="exibir_salario" onchange="toggleSalario(this.value)">
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>
                    </div>

                    <div class="salario" id="campo_salario" style="display: none;">
                        <label for="salario">Salário</label>
                        <input type="text" name="salario" id="salario" placeholder="">
                    </div>

                    <script>
                        function toggleSalario(valor) {
                            const campo = document.getElementById('campo_salario');
                            campo.style.display = valor === 'sim' ? 'block' : 'none';
                        }
                    </script>

                    <div class="beneficios">
                        <label for="beneficios">Descreva os benefícios da vaga</label>
                        <input type="text" name="beneficios" id="beneficios" required placeholder="">
                    </div>
                    
                    <div class="para_pcd">
                        <label for="para_pcd">Esta vaga é destinada a pessoas PCD ou alguma minoria?</label>
                        <select id="para_pcd" name="para_pcd" onchange="togglePCD(this.value)">
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>
                    </div>

                    <div class="checkbox_pcd" id="checkbox_pcd" style="display: none;">
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao1" name="pcd_grupo[]" value="pcd">
                            <label for="opcao1">Pessoa com Deficiência (PCD)</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao2" name="pcd_grupo[]" value="negro">
                            <label for="opcao2">Negro/Pardo</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao3" name="pcd_grupo[]" value="lgbtqia">
                            <label for="opcao3">LGBTQIA+</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao4" name="pcd_grupo[]" value="indigena">
                            <label for="opcao4">Indígena</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao5" name="pcd_grupo[]" value="mulher">
                            <label for="opcao5">Mulher</label>
                        </div>
                    </div>

                    <script>
                        function togglePCD(valor) {
                            const campo = document.getElementById('checkbox_pcd');
                            campo.style.display = valor === 'sim' ? 'block' : 'none';
                        }
                    </script>

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

        @elseif(request('tipo_postagem') == 'curso')
            <div class="form_curso">
                <h1 class="titulo">Criar Postagem — Curso</h1>

                <form action="{{ route('criarPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="titulo_post">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" required placeholder="">    
                    </div>

                    <div class="descricao">
                        <label for="nome">Descrição</label>
                        <input type="text" name="descricao" id="descricao" required placeholder="">
                    </div>

                    <div class="instituicao">
                        <label for="titulo">instituicao</label>
                        <input type="text" name="instituicao" id="instituicao" required placeholder="">    
                    </div>

                    <div class="carga_horaria">
                        <label for="nome">Descrição</label>
                        <input type="number" name="carga_horaria" id="carga_horaria" required placeholder="">
                    </div>

                    <div class="turno">
                        <label for="turno">turno</label>
                        <select id="turno" name="turno">
                            <option value="" disabled selected>Selecione</option>
                            <option value="matutino">Matutino</option>
                            <option value="vespertino">Vespertino</option>
                            <option value="noturno">Noturno</option>
                        </select>
                    </div>

                    <div class="gratuito">
                        <label for="gratuito">O curso será gratuito?</label>
                        <select id="gratuito" name="gratuito" onchange="togglePreco(this.value)">
                            <option value="" disabled selected>Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>

                    <div class="preco" id="campo_preco" style="display: none;">
                        <label for="valor">Digite o valor de inscrição</label>
                        <input type="text" name="preco" id="valor" placeholder="">
                    </div>

                    <script>
                        function togglePreco(valor) {
                            const campo = document.getElementById('campo_preco');
                            campo.style.display = valor === 'nao' ? 'block' : 'none';
                        }
                    </script>

                    <div class="possui_certificado">
                        <label for="certificado">O curso terá certificado?</label>
                        <select id="opcoes_certificado" name="opcoes_certificado">
                            <option value="" disabled selected>Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
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
                    
                    <div class="btn-cadastrar-container">
                        <button type="submit" class="btn-cadastro">Cadastrar</button>
                    </div>

                </form>
            </div>

        @elseif(request('tipo_postagem') == 'evento')
            <div class="form_evento">
                <h1 class="titulo">Criar Postagem — Evento</h1>
                <form action="{{ route('criarPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="titulo_post">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" required placeholder="">    
                    </div>

                    <div class="descricao">
                        <label for="nome">Descrição</label>
                        <input type="text" name="descricao" id="descricao" required placeholder="">
                    </div>

                    <div class="organizacao">
                        <label for="organizacao">Organização responsável</label>
                        <input type="text" name="organizacao" id="organizacao" required placeholder="">    
                    </div>

                    <div class="local">
                        <label for="local">Local do evento</label>
                        <input type="text" name="local" id="local" required placeholder="">
                    </div>

                    <div class="checkbox_publico_alvo" id="checkbox_publico_alvo">
                        <label for="publico_alvo">Publico alvo do evento</label>
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao1" name="pcd_grupo[]" value="crianca">
                            <label for="opcao1">Crianças</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao2" name="pcd_grupo[]" value="adulto">
                            <label for="opcao2">Adultos</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao3" name="pcd_grupo[]" value="idoso">
                            <label for="opcao3">Idosos</label>
                        </div>
                        <div class="campo-checkbox">
                            <input type="checkbox" id="opcao4" name="pcd_grupo[]" value="estutantes">
                            <label for="opcao4">Estutantes</label>
                        </div>
                    </div>

                    <div class="gratuito">
                        <label for="gratuito">O evento será gratuito?</label>
                        <select id="gratuito" name="gratuito" onchange="togglePreco(this.value)>
                            <option value="" disabled selected>Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>

                    <div class="preco" id="campo_preco" style="display: none;">
                        <label for="valor">Digite o valor de inscrição</label>
                        <input type="text" name="preco" id="valor" placeholder="">
                    </div>

                    <script>
                        function togglePreco(valor) {
                            const campo = document.getElementById('campo_preco');
                            campo.style.display = valor === 'nao' ? 'block' : 'none';
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