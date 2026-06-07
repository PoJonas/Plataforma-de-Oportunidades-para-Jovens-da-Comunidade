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

        $dados = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $credentials = [
            'email' => $dados['email'],
            'password' => $dados['senha'],
        ];


        if (Auth::guard('usuarios')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'As credenciais informadas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }
}
