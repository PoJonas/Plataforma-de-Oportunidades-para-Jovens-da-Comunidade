<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vagas';
    protected $fillable = [
    'usuario_id',
    'titulo',
    'descricao',
    'requisitos',
    'regime',
    'tipo_contrato',
    'modalidade',
    'carga_horaria',
    'salario',
    'beneficios',
    'vaga_pcd',
    'tipo_pcd',
];
}
