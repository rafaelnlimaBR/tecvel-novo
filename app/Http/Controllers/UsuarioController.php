<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function novo(Request $e)
    {
        $dados = [

            'titulo' => "Usuarios",
            'grupos'    => Grupo::all()
        ];

        return view('admin.usuarios.formulario',$dados);
    }

    public function cadastrar(Request $r)
    {
        try {
            $validacao = $r->validate([
                'nome' => ['required', 'min:3', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email'],
                'senha' => ['required', 'min:4', 'max:8'],
                'grupos' => ['required']
            ]);

        $usuario = new User();
        $usuario->name      =   $validacao['nome'];
        $usuario->email     =   $validacao['email'];
        $usuario->password  =   Hash::make($validacao['senha']);

        if($usuario->save()){
            $usuario->grupos()->attach($validacao['grupos']);
            return redirect()->route('usuario.index');
        }

        }catch (\ValidationException $e){
                return redirect()->back()->withErrors($e->validator);
            }
    }

    public function editar(Request $r, User $user)
    {
        try{
            $dados = [

                'titulo' => "Usuarios",
            ];

            return view('admin.usuarios.formulario',$dados)->with('usuario',$user);


        }catch (\Exception $e){
            return $e->getMessage();
        }

    }
}
