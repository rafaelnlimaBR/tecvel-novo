<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{

    public function index(Request $r){
        $dados = [
            'titulo' => "Mensagens",
            'titulo_tabela' => "Lista de Mensagens"
        ];
        $mensagens   =   Mensagem::
            orderBy('created_at', 'desc')
            ->paginate(15)->
            withQueryString();
        return view('admin.mensagens.index',$dados)->with('mensagens',$mensagens);
    }

    public function visualizar(Mensagem $mensagem)
    {
        $dados = [
            'titulo' => "Mensagem",
            'mensagem' => $mensagem,
        ];
        return view('admin.mensagens.visualizar',$dados);
    }
    public function excluir(Mensagem $mensagem){
        try{
            $mensagem->excluir();

            return redirect()->route('mensagem.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Mensagem excluido com sucesso."]);
        }catch(\Throwable $th){
            return redirect()->route('mensagem.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }

    }



}
