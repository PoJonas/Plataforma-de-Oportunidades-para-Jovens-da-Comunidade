<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(Request $request)
    {
        return view('login.login');
    }

    public function postLogin(Request $request)
        {
        // 1. Valida os dados exatamente como vêm do formulário HTML
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required'],
        ]);

        // 2. Transforma a chave 'senha' em 'password' para o Laravel reconhecer o campo
        $credentials = [
            'email' => $dados['email'],
            'password' => $dados['senha'],
        ];

        // 3. Tenta realizar o login usando o guard da sua tabela própria ('usuario_guard')
        if (Auth::guard('usuarios')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); // Previne ataques de fixação de sessão
            return redirect()->intended('principal');
        }

        // 4. Retorna erro se a autenticação falhar no banco
        return back()->withErrors([
            'email' => 'As credenciais informadas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }
}
