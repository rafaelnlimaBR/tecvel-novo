<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function index(Request $r)
    {
        $dados = [
            'titulo' => "Categorias",
            'titulo_tabela' => "Lista de categorias"
        ];
        $categorias   =   Categoria::pesquisarPorNome($r->get('nome'))
            ->orderBy('created_at', 'desc')
            ->paginate(15)->
            withQueryString();
        return view('admin.categorias.index',$dados)->with('categorias',$categorias);
    }

    public function novo()
    {
        $dados = [
            'titulo' => "Nova Categoria",

        ];
        return view('admin.categorias.formulario',$dados);
    }

    public function cadastrar(Request $r)
    {
        try {

            $categoria          =   new Categoria();




            if($categoria->cadastrar($r->get('nome'))){
                return redirect()->route('categoria.editar',['categoria'=>$categoria])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"categoria cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('categoria.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function editar(Categoria $categoria)
    {
        $dados = [
            'titulo' => "Nova Categoria",
            'categoria' =>  $categoria
        ];
        return view('admin.categorias.formulario',$dados);
    }

    public function atualizar(Request $r, Categoria $categoria)
    {
        try {
            $validacao = Validator::make($r->all(),[
                'nome' => 'required|unique:categorias,nome,'.$categoria->id,
            ]);


            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput();
            }

            if($categoria->cadastrar($r->get('nome'))){
                return redirect()->route('categoria.editar',['categoria'=>$categoria])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"categoria cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('categoria.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(Categoria $categoria)
    {
        try{
            if($categoria->excluir()){
                return redirect()->route('categoria.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Excluido com sucesso."]);
            }
        }catch (\Throwable $th) {
            return redirect()->route('categoria.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }
}
