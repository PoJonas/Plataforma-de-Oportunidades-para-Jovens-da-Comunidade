<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetoSocial extends Model
{   

    protected $table = 'eventos';
    
    protected $fillable = [
        'usuario_id',
        'titulo',
        'descricao',
        'organizacao_responsavel',
        'local',
        'publico_alvo',
        'is_gratuito',
        'valor',
        'data_inicio',
        'data_fim',
        'hora_inicio',
        'hora_fim',
        'limite_vagas',
    ];
}
