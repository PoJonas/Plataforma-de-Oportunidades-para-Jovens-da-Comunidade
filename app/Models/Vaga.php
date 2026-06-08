<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vagas';
    protected $fillable = ['titulo', 'descricao', 'requisitos', 'regime', 'tipo_contrato', 'carga_horaria', 'salario', 'beneficios', 'localizacao', 'tipo_vaga', 'vaga_pcd', 'empresa_id', 'status', 'visualizacoes'];
}
