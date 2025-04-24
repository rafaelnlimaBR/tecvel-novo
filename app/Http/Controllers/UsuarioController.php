<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index(Request $r)
    {
        $dados = [

            'titulo' => "Usuarios",
            'titulo_tabela' => "Lista de Usuários"
        ];
        $usuarios   =   User::all();

        return view('admin.usuarios.index',$dados)->with('usuarios',$usuarios);
    }
}
