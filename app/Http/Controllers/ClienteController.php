<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\AppContato;
use App\Models\Contato;
use Exception;
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
                return redirect()->route('cliente.editar',['id'=>$cliente->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Cliente cadastrado com sucesso."]);
            }



        } catch (\Exception $th) {
            return redirect()->route('cliente.novo')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);;
        }
    }

    public function editar($id){
        $cliente    =   Cliente::find($id);
        $dados = [
            'titulo' => "Editar Cliente",

            'cliente'       =>  $cliente,
            'contatos'      => $cliente->contatos
        ];
        return view('admin.clientes.formulario',$dados);
    }

    public function adicionarContato(Request $r){
        try {
            $cliente        =   Cliente::find($r->id);
            $contato        =   new ContatoController();

            $contato = $contato->cadastrar($r->get('numero'),$r->get('responsavel'),$r->get('app'));
            $cliente->contatos()->attach($contato);
            return response()->json([
                'contatos'=>view('admin.contatos.tabela',['contatos'=>$cliente->contatos,'id'=>$cliente->id])->render(),
            ]);

        } catch (Exception $th) {
            return response()->json(['erro'=>$th->getMessage()]);
            return response()->json([
                'contatos'=>view('admin.contatos.tabela',['erro'=>$th->getMessage()])->render(),
            ]);
        }
    }

    public function atualizarContato(Request $r){
        try {

            $contato        = new ContatoController();
            $cliente        =   Cliente::find($r->get('foreignkey'));

            $contato->atualizar($r->get('id'),$r->get('numero'),$r->get('responsavel'),$r->get('app'));
            return response()->json([
                'contatos'=>view('admin.contatos.tabela',['contatos'=>$cliente->contatos,'id'=>$cliente->id])->render(),
            ]);

        } catch (Exception $e) {
            return \response()->json(['erro'=>$e->getMessage()]);
        }
    }

}
