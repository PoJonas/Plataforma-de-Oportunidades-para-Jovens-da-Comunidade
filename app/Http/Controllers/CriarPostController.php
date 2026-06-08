<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\Curso;
use App\Models\ProjetoSocial;

class CriarPostController extends Controller
{
    public function render_criarpost()
    {
        return view('pages.criarpost');
    }

     public function criarPostagem(Request $request)
     {  

        if (!auth('usuarios')->check()) {
        return redirect()->route('login');
    }
        $tipo = $request->input('tipo');
        
        if ($tipo == "1") {
           $request->validate([
            'titulo'        => 'required|string|max:255',
            'descricao'     => 'required|string',
            'requisitos'    => 'required|string',
            'regime'        => 'required|in:Presencial,Remoto,Hibrido',
            'tipo_contrato' => 'required|in:CLT,PJ,A combinar,Estágio',
            'modalidade'    => 'required|in:Tempo Integral,Meio Período,Horário Flexivel',
            'carga_horaria' => 'required|string|max:50',
            'salario'       => 'nullable|string|max:100',
            'beneficios'    => 'required|string',
            'vaga_pcd'      => 'required|in:0,1',
            'tipo_pcd'      => 'nullable|required_if:vaga_pcd,1|in:pcd,preto_pardo,lgbtqia+,indigena,mulher',
        ]);

            Vaga::create([
                'usuario_id' => auth('usuarios')->id(),
                'titulo' => $request->input('titulo'),
                'descricao' => $request->input('descricao'),
                'requisitos' => $request->input('requisitos'),
                'regime' => $request->input('regime'),
                'tipo_contrato' => $request->input('tipo_contrato'),
                'modalidade' => $request->input('modalidade'),
                'carga_horaria' => $request->input('carga_horaria'),
                'salario' => $request->input('salario'),
                'beneficios' => $request->input('beneficios'),
                'vaga_pcd' => $request->input('vaga_pcd'),
                'tipo_pcd' => $request->input('tipo_pcd'),
            ]);

            return redirect()->route('dashboard');
        }
        
        else if ($tipo == 2) {

            // Validar e Criar curso
            $validatedData = $request->validate([
                'titulo' => 'required|string|max:60',
                'descricao' => 'required|string',
                'instituicao_responsavel' => 'required|string|max:100',
                'carga_horaria' => 'required|string|max:50',
                'turno' => 'required|in:Matutino,Vespertino,Noturno',
                'is_gratuito' => 'required|in:0,1',                     
                'valor' => 'nullable|required_if:is_gratuito,0|integer|min:0', 
                'possui_certificado' => 'required|in:0,1',
                'pre_requisitos' => 'required|string',
                'limite_vagas' => 'nullable|integer|min:1',
                'data_inicio' => 'required|date|date_format:Y-m-d|after_or_equal:today',
                'data_fim' => 'nullable|sometimes|date|date_format:Y-m-d|after:data_inicio',
            ]);

            Curso::create([
                'usuario_id' => auth('usuarios')->id(),
                'titulo' => $request->input('titulo'),
                'descricao' => $request->input('descricao'),
                'instituicao_responsavel' => $request->input('instituicao_responsavel'),
                'carga_horaria' => $request->input('carga_horaria'),
                'turno' => $request->input('turno'),
                'is_gratuito' => $request->input('is_gratuito'),
                'valor' => $request->input('valor'),
                'possui_certificado' => $request->input('possui_certificado'),
                'pre_requisitos' => $request->input('pre_requisitos'),
                'limite_vagas' => $request->input('limite_vagas'),
                'data_inicio' => $request->input('data_inicio'),
                'data_fim' => $request->input('data_fim'),
            ]);

            return redirect()->route('dashboard');

        } else if ($tipo == "3") {

            $request->validate([
                'titulo'                  => 'required|string|max:60',
                'descricao'               => 'required|string',
                'organizacao_responsavel' => 'required|string|max:100',
                'local'                   => 'required|string|max:50',
                'publico_alvo'            => 'required|array|min:1',
                'publico_alvo.*'          => 'in:crianca,adulto,idoso,estudante',
                'is_gratuito'             => 'required|in:0,1',
                'valor'                   => 'nullable|required_if:is_gratuito,0|integer|min:0',
                'data_inicio'             => 'required|date|date_format:Y-m-d|after_or_equal:today',
                'data_fim'                => 'nullable|sometimes|date|date_format:Y-m-d|after:data_inicio',
                'hora_inicio'             => 'required|date_format:H:i',
                'hora_fim'                => 'nullable|sometimes|date_format:H:i|after:hora_inicio',
                'limite_vagas'            => 'nullable|integer|min:1',
            ]);

            // publico_alvo vem como array, banco espera string
            $publicoAlvo = implode(',', $request->input('publico_alvo'));

            ProjetoSocial::create([
                'usuario_id'              => auth('usuarios')->id(),
                'titulo'                  => $request->input('titulo'),
                'descricao'               => $request->input('descricao'),
                'organizacao_responsavel' => $request->input('organizacao_responsavel'),
                'local'                   => $request->input('local'),
                'publico_alvo'            => $publicoAlvo, // ✅ "crianca,adulto,idoso"
                'is_gratuito'             => $request->input('is_gratuito'),
                'valor'                   => $request->input('valor'),
                'data_inicio'             => $request->input('data_inicio'),
                'data_fim'                => $request->input('data_fim'),
                'hora_inicio'             => $request->input('hora_inicio'),
                'hora_fim'                => $request->input('hora_fim'),
                'limite_vagas'            => $request->input('limite_vagas'),
            ]);

            return redirect()->route('dashboard');
            }
    }
}
