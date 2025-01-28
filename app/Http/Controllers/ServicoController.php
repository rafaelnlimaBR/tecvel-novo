<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index(Request $r){

        $dados = [
            'titulo' => "Servicos",
            'titulo_tabela' => "Lista de Servicos"
        ];
        $servicos   =   Servico::pesquisarPorNome($r->get('nome'))
            ->orderBy('created_at', 'desc')
            ->paginate(15)->
            withQueryString();

        return view('admin.servicos.index',$dados)->with('servicos',$servicos);
    }

    public function editar($id){
        try {
            $servico          =   Servico::find($id);
            if($servico == null){
                return redirect()->route('servico.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Servico não existe."]);
            }

            $dados = [
                'titulo' => "Editar Servico",
                'servico' =>  $servico
            ];
            return view('admin.servicos.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('servico.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo' => "Nova Servico",

        ];
        return view('admin.servicos.formulario',$dados);
    }

    public function cadastrar(Request $r){
        try {
            $servico          =   new Servico();
            $servico->nome    =   $r->get('servico');
            $servico->valor    =   $r->get('valor');



            if($servico->save()){

                if($r->has("modal")){
                    return $servico;
                }else{
                    return redirect()->route('servico.editar',['id'=>$servico->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Servico cadastrado com sucesso."]);
                }

            }


        } catch (\Throwable $th) {
            if($r->ajax()){
                return response()->json(['erro'=>$th->getMessage()]);
            }else{
                return redirect()->route('servico.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
            }


        }
    }

    public function atualizar(Request $r){
        try {
            $servico          =   Servico::find($r->get('id'));
            $servico->nome    =   $r->get('servico');
            $servico->valor    =   $r->get('valor');


            if($servico->save()){
                return redirect()->route('servico.editar',['id'=>$servico->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Servico atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('servico.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(){

    }

    public function servicoJson(Request $r)
    {
        $servicos = Servico::PesquisarPorNome($r->get('q'))->orderBy('created_at', 'desc')->limit(20)->get();

//        return response()->json($servicos->count());
        $retorno    =   [];

        foreach ($servicos as $key => $value) {

            $retorno[$key]['id'] = $value->id;
            $retorno[$key]['text'] = $value->nome;
            $retorno[$key]['nome'] = $value->nome;
            $retorno[$key]['valor'] = $value->valor;



        }
        return response()->json($retorno);
    }
}
