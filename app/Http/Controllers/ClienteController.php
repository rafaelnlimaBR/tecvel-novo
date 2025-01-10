<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\AppContato;
use App\Models\Contato;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index (Request $r){
        $dados = [
            'titulo' => "Clientes",
            'titulo_tabela' => "Lista de Clientes"
        ];
        $clientes   =   Cliente::pesquisarPorNome($r->input('nome'))
                                ->pesquisarPorEmail($r->input('email'))
                                ->pesquisarPorTelefone($r->input('telefone'))
                                ->orderBy('created_at', 'desc')
                                ->paginate(15)->
                                withQueryString();
        return view('admin.clientes.index',$dados)->with('clientes',$clientes);
    }

    public function novo (Request $r){
        $dados = [
            'titulo' => "Novo Cliente",
            'aplicativos'   => AppContato::all(),
        ];
        return view('admin.clientes.formulario',$dados);
    }

    public function cadastrar(Request $r){

        try {
            $cliente  = new Cliente();
            $cliente->nome  =   $r->get('nome');
            $cliente->email =   $r->get('email');

            if($cliente->save()){
                return redirect()->route('cliente.editar',['id'=>$cliente->id]);
            }



        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function editar($id){
        $cliente    =   Cliente::find($id);
        $dados = [
            'titulo' => "Editar Cliente",
            'aplicativos'   => AppContato::all(),
            'cliente'       =>  $cliente,
            'contatos'      => $cliente->contatos
        ];
        return view('admin.clientes.formulario',$dados);
    }

}
