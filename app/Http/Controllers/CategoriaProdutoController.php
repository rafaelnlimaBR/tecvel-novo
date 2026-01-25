<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProduto;
use Illuminate\Http\Request;

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

    public function cadastrar(CategoriaProduto $categoriaProduto)
    {

    }

    public function editar(CategoriaProduto $categoria)
    {
        $dados = [
            'titulo' => "Nova Categoria",
            'categoria' =>  $categoria
        ];
        return view('admin.categorias.formulario',$dados);
    }

    public function atualizar(CategoriaProduto $categoriaProduto)
    {

    }
}
