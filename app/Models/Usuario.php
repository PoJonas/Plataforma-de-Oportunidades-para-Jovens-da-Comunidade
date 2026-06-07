<?php

namespace App\Models;

// 1. IMPORTANTE: Remova o 'use Illuminate\Database\Eloquent\Model;' se ele existir
// 2. ADICIONE este use abaixo para habilitar os recursos de autenticação:
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

// 3. Mude a classe para estender 'Authenticatable' em vez de 'Model'
class Usuario extends Authenticatable 
{
    use Notifiable;

    // Nome da sua tabela própria
    protected $table = 'usuarios'; 

    // Campos liberados para preenchimento
    protected $fillable = [
    'nome', 'cpf_cnpj', 'email', 'senha', 'telefone', 
];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Diz ao Laravel que a senha está criptografada
    protected function casts(): array
    {   
        return [
            'senha' => 'hashed',
        ];
    }
}
