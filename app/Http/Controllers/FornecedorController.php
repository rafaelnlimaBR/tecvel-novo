<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;


class FornecedorController extends Controller
{


    public function index(Request $r)
    {

        try{
            $dados = [
                'titulo' => "Fornecedores",
                'titulo_tabela' => "Lista de Fornecedores",
                'fornecedores' => Fornecedor::pesquisarPorNome($r->get('nome'))->orderBy('created_at', 'desc')->paginate(10)->withQueryString()
            ];

            return view('admin.fornecedores.index', $dados);

        }catch (\Exception $e){
            return $e->getMessage();
            return redirect()->route('fornecedores.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function novo()
    {
        try{
            $dados = [
                'titulo' => "Novo Fornecedor",
            ];

            return view('admin.fornecedores.formulario', $dados);

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function cadastrar(FornecedorRequest $r)
    {
        try {
            $validacao = $r->validate([
                'nome' => 'required|unique:fornecedores|min:3',
            ]);

            $fornecedor = new Fornecedor();
            $fornecedor->nome       = $r->get('nome');
            $fornecedor->endereco   =   $r->get('endereco');
            if($fornecedor->save()){
                if($r->get('modal') == 1){
                    return response()->json(['alerta'=>'Registo Cadastrado com Sucesso!']);
                }else{
                    return redirect()->route('fornecedor.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>'Fornecedor cadastrado com sucesso!']);
                }

            }
        }catch (\Exception $e){
            if($r->get('modal') == 1){
                return response()->json(['erro'=>$e->getMessage()]);
            }else{
                return redirect()->route('fornecedor.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
            }

        }
    }

    public function editar($id){
        try {
            $fornecedor         =   Fornecedor::find($id);
            if($fornecedor == null){
                return redirect()->route('fornecedor.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>'Fornecedor não encontrado.']);
            }
            $dados = [
                'titulo' => "Novo Fornecedor",
                'fornecedor' => $fornecedor,
            ];
            return view('admin.fornecedores.formulario', $dados);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function atualizar(FornecedorRequest $r   )
    {
        try {
            $fornecedor = Fornecedor::find($r->get('id'));


            $fornecedor->nome       = $r->get('nome');
            $fornecedor->endereco   =   $r->get('endereco');
            if($fornecedor->save()){
                return redirect()->route('fornecedor.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>'Fornecedor cadastrado com sucesso!']);
            }
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir($id)
    {
        try{
            $fornecedor = Fornecedor::find($id);
            if($fornecedor == null){
                return redirect()->route('fornecedor.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>'Fornecedor não encontrado.']);
            }
            if($fornecedor->delete()){
                return redirect()->route('fornecedor.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>'Fornecedor excluido com sucesso!.']);
            }
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}
