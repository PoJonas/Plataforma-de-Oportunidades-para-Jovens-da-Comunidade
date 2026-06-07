<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function realizarLogin(Request $request)
    {

        $request->all();
        //@dd($request);

        $usuario = new Usuario();
        $usuario->email = $request->input('email');
        $usuario->senha = $request->input('senha');
        echo '<pre>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        print_r($usuario->getAttributes());
        echo '</pre>';
        $usuario->save();
        return view('login.login');
    }
}
