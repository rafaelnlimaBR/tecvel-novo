<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class PostagemController extends Controller
{

    public function index(Request $r)
    {
        $dados = [
            'titulo' => "Postagens",
            'titulo_tabela' => "Lista de Postagens"
        ];
        $postagens   =   Postagem::pesquisarPorTitulo($r->get('titulo'))
            ->orderBy('created_at', 'desc')
            ->paginate(15)->
            withQueryString();
        return view('admin.postagens.index',$dados)->with('postagens',$postagens);
    }

    public function novo()
    {
        $dados = [
            'titulo' => "Nova Postagem",

        ];
        return view('admin.postagens.formulario',$dados);
    }

    public function cadastrar(Request $r)
    {
        try {
            $validacao = Validator::make($r->all(),[
                'titulo' => 'required',
                'texto' => 'required',
                'imagem' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'alt'   =>  'required',
                'categorias'=> 'required',
                'tags'  =>  'required'
            ]);
            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput();
            }

            $postagem          =   new Postagem();

            if (!file_exists(public_path('/images/postagens/'))){
                mkdir(public_path('/images/postagens/'), 0777, true);
            }
            $image  =   $r->file('imagem');
            $filename="";
            $filename = Str::random(16).'.'.$image->getClientOriginalExtension();
            $resize  =  Image::read($image)->resize(1024,768);
            $resize->save(public_path('/images/postagens/').$filename);

            $ativo  =  $r->get('ativo') =="1"?1:0;
            if($postagem->cadastrar($r->get('titulo'),$r->get('texto'),$filename, $r->get('alt'),$ativo,auth()->user(),$r->get('categorias'),$r->get('tags'))){
                return redirect()->route('postagem.editar',['postagem'=>$postagem])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Postagem cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('postagem.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function editar(Postagem $postagem)
    {
        $dados = [
            'titulo' => "Nova Postagem",
            'postagem' =>  $postagem
        ];
        return view('admin.postagens.formulario',$dados);
    }

    public function atualizar(Request $r, Postagem $postagem)
    {
        try {
            $validacao = Validator::make($r->all(),[
                'titulo' => 'required',
                'texto' => 'required',
                'imagem' => 'image|mimes:jpeg,png,jpg|max:2048',
                'alt'   =>  'required',
                'categorias'=> 'required',
                'tags'  =>  'required'
            ]);


            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput();
            }
            $filename  =   "";
            if($r->hasFile('imagem')){
                if(\File::exists(public_path('/images/postagens/').$postagem->imagem)){
                    \File::delete(public_path('/images/postagens/').$postagem->imagem);
                }

                $image  =   $r->file('imagem');
                $filename="";
                $filename = Str::random(16).'.'.$image->getClientOriginalExtension();
                $resize  =  Image::read($image)->resize(1024,768);
                $resize->save(public_path('/images/postagens/').$filename);
            }else{
                $filename   =   $postagem->imagem;
            }

            $ativo  =  $r->get('ativo') =="1"?1:0;
            if($postagem->cadastrar($r->get('titulo'),$r->get('texto'),$filename, $r->get('alt'),$ativo,auth()->user(), $r->get('categorias'),$r->get('tags'))){
                return redirect()->route('postagem.editar',['postagem'=>$postagem])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Postagem atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('postagem.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(Postagem $postagem)
    {
        try{
            if(\File::exists(public_path('/images/postagens/').$postagem->imagem)){
                \File::delete(public_path('/images/postagens/').$postagem->imagem);
            }
            if($postagem->excluir()){
                return redirect()->route('postagem.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Excluido com sucesso."]);
            }
        }catch (\Throwable $th) {
            return redirect()->route('postagem.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }
}
