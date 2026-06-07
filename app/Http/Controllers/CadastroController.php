<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class CadastroController extends Controller
{
    public function Cadastrar()
    {
        return view('cadastro.cadastro');
    }

    public function realizarCadastro(Request $request)
    {
        $usuario = new Usuario();
        $request->validate([
            'cpf_cnpj' => 'required|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'senha' => 'required',
            'telefone' => 'required',
        ]);

        $usuario->nome = $request->input('nome');
        $usuario->cpf_cnpj = $request->input('cpf_cnpj');
        $usuario->email = $request->input('email');
        $usuario->senha = bcrypt($request->input('senha'));
        $usuario->telefone = $request->input('telefone');
        $usuario->save();

        return redirect()->route('login');
    }
}
