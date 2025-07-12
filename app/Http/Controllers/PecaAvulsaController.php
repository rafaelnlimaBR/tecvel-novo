<?php

namespace App\Http\Controllers;

use App\Models\PecaAvulsa;
use Illuminate\Http\Request;

class PecaAvulsaController extends Controller
{
    public function index(Request $r){

        $dados = [
            'titulo' => "Peças",
            'titulo_tabela' => "Lista de Peças"
        ];
        $pecas   =   PecaAvulsa::pesquisarPorNome($r->get('nome'))
            ->orderBy('created_at', 'desc')
            ->paginate(15)->
            withQueryString();

        return view('admin.pecas.index',$dados)->with('pecas',$pecas);
    }

    public function editar($id){
        try {
            $peca          =   PecaAvulsa::find($id);
            if($peca == null){
                return redirect()->route('peca.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"PecaAvulsa não existe."]);
            }

            $dados = [
                'titulo' => "Editar PecaAvulsa",
                'peca' =>  $peca
            ];
            return view('admin.pecas.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('peca.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo' => "Nova PecaAvulsa",

        ];
        return view('admin.pecas.formulario',$dados);
    }

    public function cadastrar(Request $r){
        try {
            $peca          =   new PecaAvulsa();
            $peca->nome    =   strtoupper($r->get('peca'));
            $peca->valor    =   $r->get('valor');



            if($peca->save()){

                if($r->has("modal")){
                    return $peca;
                }else{
                    return redirect()->route('peca.editar',['id'=>$peca->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"PecaAvulsa cadastrado com sucesso."]);
                }

            }


        } catch (\Throwable $th) {
            if($r->ajax()){
                return response()->json(['errors'=>$th->getMessage()]);
            }else{
                return redirect()->route('peca.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
            }


        }
    }

    public function atualizar(Request $r){
        try {
            $peca          =   PecaAvulsa::find($r->get('id'));
            $peca->nome    =   strtoupper($r->get('peca'));
            $peca->valor    =   $r->get('valor');


            if($peca->save()){
                return redirect()->route('peca.editar',['id'=>$peca->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"PecaAvulsa atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('peca.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(){

    }

    public function pecaJson(Request $r)
    {
        $pecas = PecaAvulsa::PesquisarPorNome($r->get('q'))->orderBy('created_at', 'desc')->limit(20)->get();

//        return response()->json($pecas->count());
        $retorno    =   [];

        foreach ($pecas as $key => $value) {

            $retorno[$key]['id'] = $value->id;
            $retorno[$key]['text'] = $value->nome;
            $retorno[$key]['nome'] = $value->nome;
            $retorno[$key]['valor'] = $value->valor;



        }
        return response()->json($retorno);
    }
}
