<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;


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
    public function getAuthPassword()
    {
        return $this->senha;
    }
}
