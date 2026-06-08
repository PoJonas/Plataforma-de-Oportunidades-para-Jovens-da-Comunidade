<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriarPostController extends Controller
{
    public function render_criarpost()
    {
        return view('pages.criarpost');
    }

     public function criarPostagem(Request $request)
     {
         $tipo = $request->input('tipo');
         
        if ($tipo == 1) {
           //  Validar e Criar vaga
        } 
        
        else if ($tipo == 2) {

            // Validar e Criar curso
            $validatedData = $request->validate([
                'titulo' => 'required|string|max:255',
                'descricao' => 'required|string',
            ]);

            return redirect()->route('dashboard')->with('success', 'Curso criado com sucesso!');
        } else if ($tipo == 3) {
            // Validar e Criar evento
            $validatedData = $request->validate([
                'titulo' => 'required|string|max:255',
                'descricao' => 'required|string',
            ]);

            return redirect()->route('dashboard')->with('success', 'Evento criado com sucesso!');
        }
     }
}
