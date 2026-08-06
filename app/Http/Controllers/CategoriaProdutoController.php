<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaProdutoController extends Controller
{

    public function index(Request $r)
    {
        $dados = [
            'titulo' => "Categorias de Produtos",
            'titulo_tabela' => "Lista de categorias de produtos"
        ];
        $categorias   =   CategoriaProduto::pesquisarPorNome($r->get('nome'))
            ->orderBy('created_at', 'desc')
            ->paginate(15)->
            withQueryString();
        return view('admin.categorias_produtos.index',$dados)->with('categorias',$categorias);
    }

    public function novo()
    {
        $dados = [
            'titulo' => "Nova Categoria de Produto",

        ];
        return view('admin.categorias_produtos.formulario',$dados);
    }

    public function cadastrar(Request $r)
    {
        try {
            $validacao      =   Validator::make($r->all(),[
                'nome' => 'required|min:2|max:100'
            ]) ;;

            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput();
            }

            $categoria  =   new CategoriaProduto();
            $status = $r->get('status')=='1'?1:0;
            $categoria->gravar($r->get('nome'),$status);

            return redirect()->route('categoria.produto.editar',['categoria'=>$categoria])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Registro atualizado com sucesso!."]);

        }catch (\Exception $e){
            return redirect()->route('categoria.produto.editar',['categoria'=>$categoria])->withInput()->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function editar(CategoriaProduto $categoria)
    {
        $dados = [
            'titulo' => "Nova Categoria",
            'categoria' =>  $categoria
        ];
        return view('admin.categorias_produtos.formulario',$dados);
    }

    public function atualizar(Request $r,CategoriaProduto $categoria)
    {

        try {
            $validacao      =   Validator::make($r->all(),[
                'nome' => 'required|min:2|max:100'
            ]) ;
            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput()->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>"Preencher os campos obrigatórios!."]);
            }
            $status = $r->get('status')=='1'?1:0;
            $categoria->gravar($r->get('nome'),$status);

            return redirect()->route('categoria.produto.editar',['categoria'=>$categoria])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Registro atualizado com sucesso!."]);

        }catch (\Exception $e){
            return redirect()->route('categoria.produto.editar',['categoria'=>$categoria])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }

    }

    public function excluir(CategoriaProduto $categoria)
    {
        try {

            $categoria->delete();
            return redirect()->route('categoria.produto.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Excluido com sucesso!."]);

        }catch (\Exception $e){
            return  redirect()->route('categoria.produto.excluir')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }
}
