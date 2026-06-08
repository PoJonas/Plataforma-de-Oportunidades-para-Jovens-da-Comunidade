<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'usuario_id',
        'titulo',
        'descricao',
        'instituicao_responsavel',
        'carga_horaria',
        'turno',
        'is_gratuito',
        'valor',
        'possui_certificado',
        'pre_requisitos',
        'limite_vagas',
        'data_inicio',
        'data_fim',
    ];
}
