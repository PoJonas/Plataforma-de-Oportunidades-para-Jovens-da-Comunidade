<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function Cadastrar()
    {
        return view('cadastro.cadastro');
    }

    public function realizarCadastro(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf_cnpj' => 'required|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'senha' => 'required|min:6',
            'telefone' => 'required',
        ]);

        Usuario::create([
            'nome' => $request->input('nome'),
            'cpf_cnpj' => $request->input('cpf_cnpj'),
            'email' => $request->input('email'),
            'senha' => bcrypt($request->input('senha')),
            'telefone' => $request->input('telefone'),
        ]);

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }
}
