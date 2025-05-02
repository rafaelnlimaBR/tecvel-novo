<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\ImagensNota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

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
                'grupos' => ['required'],
                'imagem'    =>  ['mimes:jpeg,jpg,png'],
            ]);

        $usuario = new User();
        $usuario->name      =   $validacao['nome'];
        $usuario->email     =   $validacao['email'];
        $usuario->password  =   Hash::make($validacao['senha']);


            if($r->hasFile('imagem')){
                $image = $r->file('imagem');
                if (!file_exists(public_path('/images/users/'))){
                    mkdir(public_path('/images/users/'), 0777, true);
                }
                $filename="";
                $filename = Str::random(16).'.'.$image->getClientOriginalExtension();

                $resize  =  Image::read($image)->resize(128,128);
                $resize->save(public_path('/images/users/').$filename);
                $usuario->img    =   $filename;
            }





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

    public function atualizar(Request $r, User $usuario)
    {
        $validacao = $r->validate([
            'nome' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$usuario->id],
            'grupos' => ['required'],

        ]);
        try{
            $usuario->name      =   $validacao['nome'];
            $usuario->email     =   $validacao['email'];
            if($r->get('senha') != null){
                $usuario->password     =   $r->get('senha');
            }
            if($r->hasFile('imagem')){
                if(\File::exists(public_path('/images/users/').$usuario->img)){
                    \File::delete(public_path('/images/users/').$usuario->img);
                }


                    $image = $r->file('imagem');
                    if (!file_exists(public_path('/images/users/'))){
                        mkdir(public_path('/images/users/'), 0777, true);
                    }
                    $filename="";
                    $filename = Str::random(16).'.'.$image->getClientOriginalExtension();

                    $resize  =  Image::read($image)->resize(128,128);
                    $resize->save(public_path('/images/users/').$filename);
                    $usuario->img    =   $filename;


            }
            if($usuario->save()){
                $usuario->grupos()->sync($validacao['grupos']);
                return redirect()->route('usuario.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Usuario atualizado com sucesso."]);
            }

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir(User $usuario)
    {

            try{
                if(\File::exists(public_path('/images/users/').$usuario->img)){
                    \File::delete(public_path('/images/users/').$usuario->img);
                }
                if($usuario->delete()){
                    return redirect()->route('usuario.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Usuario excluido com sucesso."]);;
                }



            }catch (\Exception $e){
                return $e->getMessage();
            }

    }
}
