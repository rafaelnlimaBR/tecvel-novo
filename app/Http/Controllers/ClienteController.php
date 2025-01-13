<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\AppContato;
use App\Models\Contato;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\ContatoController;

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
            $cliente->nome  =   strtoupper($r->get('nome'));
            $cliente->email =   strtolower($r->get('email'));

            if($cliente->save()){
                return redirect()->route('cliente.editar',['id'=>$cliente->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Cliente cadastrado com sucesso."]);
            }
        } catch (\Exception $th) {
            return redirect()->route('cliente.novo')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);;
        }
    }

    public function atualizar(Request $r){

        try {
            $cliente        = Cliente::find($r->get('id'));

            $cliente->nome  =   strtoupper($r->get('nome'));
            $cliente->email =   strtolower($r->get('email'));

            if($cliente->save()){
                return redirect()->route('cliente.editar',['id'=>$cliente->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Cliente cadastrado com sucesso."]);
            }



        } catch (\Exception $th) {
            return redirect()->route('cliente.novo')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);;
        }
    }

    public function editar($id){
        $cliente    =   Cliente::find($id);
        if($cliente == null){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"não existe registro"]);;
        }
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


            $contato = ContatoController::cadastrar($r->get('numero'),$r->get('app'));

            $cliente->contatos()->attach($contato,['responsavel'=>$r->get('responsavel')]);
            return response()->json([
                'contatos'=>view('admin.contatos.tabela',['contatos'=>$cliente->contatos,'id'=>$cliente->id,'route_update'=>route('cliente.atualizar.contato'),"route_delete"=>route('cliente.excluir.contato')])->render(),
            ]);

        } catch (Exception $th) {
            return response()->json(['erro'=>$th->getMessage()]);

        }
    }

    public function atualizarContato(Request $r){
        try {

            $contato        =   Contato::find($r->get('id'));
            $cliente        =   Cliente::find($r->get('foreignkey'));

            ContatoController::atualizar($r->get('id'),$r->get('numero'),$r->get('app'));
            $cliente->contatos()->updateExistingPivot($contato->id,['responsavel'=>$r->get('responsavel')]);
            return response()->json([
                'contatos'=>view('admin.contatos.tabela',['contatos'=>$cliente->contatos,'id'=>$cliente->id,'route_update'=>route('cliente.atualizar.contato'),"route_delete"=>route('cliente.excluir.contato')])->render(),
            ]);

        } catch (Exception $e) {
            return \response()->json(['erro'=>$e->getMessage()]);
        }
    }

    public function excluirContato(Request $r){
        try {


            $cliente        =   Cliente::find($r->get('foreignkey'));
            $cliente->contatos()->detach($r->get('id'));


            return response()->json([
                'contatos'=>view('admin.contatos.tabela',['contatos'=>$cliente->contatos,'id'=>$cliente->id,'route_update'=>route('cliente.atualizar.contato'),"route_delete"=>route('cliente.excluir.contato')])->render(),
            ]);

        } catch (Exception $e) {
            return \response()->json(['erro'=>$e->getMessage()]);
        }
    }

}
