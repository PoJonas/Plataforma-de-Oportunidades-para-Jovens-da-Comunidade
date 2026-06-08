<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetoSocial extends Model
{
    protected $table = "eventos";
    protected $fillable = ['titulo', 'descricao', 'data_inicio', 'data_fim', 'localizacao', 'organizacao_responsavel', 'publico_alvo', 'status'];
}
