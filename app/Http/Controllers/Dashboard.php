<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Vaga;
use App\Models\Curso;
use App\Models\ProjetoSocial;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        
    $usuario = auth()->guard('usuarios')->user();

    $totalvagas = Vaga::where(['usuario_id' => $usuario->id,'status'=> true])->count();

    $cursosAndamento = Curso::where(['usuario_id'=>$usuario->id,'status'=> true])->count();

    $projetos = ProjetoSocial::where(['usuario_id'=>$usuario->id,'status'=> true])->count();

    if($usuario && $usuario->is_admin){
        return view('pages.admin-dashboard', [
        'usuario'=>$usuario,
        'cargo'=>"Administrador",
        "vagas"=>$totalvagas,
        "cursosAndamento"=>$cursosAndamento,
        "projeto"=>$projetos,
        ]);
    }
    else{
        return view("pages.dashboard", [
            'usuario'=>$usuario,
            'cargo'=>"cidadão",
            'vagas'=>$totalvagas,
            'cursosAndamento'=>$cursosAndamento,
            'projeto'=>$projetos,
        ]);
    }
    }

}
