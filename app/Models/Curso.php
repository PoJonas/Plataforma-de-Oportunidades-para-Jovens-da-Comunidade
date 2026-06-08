<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nome', 'descricao', 'duracao', 'nivel', 'area_interesse', 'instituicao', 'certificado', 'link_inscricao', 'data_inicio', 'data_fim'];
}
