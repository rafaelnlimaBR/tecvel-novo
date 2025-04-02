<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComissaoRequest;
use App\Models\Comissao;
use App\Models\Fornecedor;
use App\Models\Historico;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComissaoController extends Controller
{
    public function novo($id,$historico_id)
    {
        try {


            $historico          =   Historico::find($historico_id);
            if($historico == null){
                return "historico inexistente";
            }
            if($historico->contrato->id != $id  ){
                return "Contrato inexistente";
            }
            $dados = [
                'titulo' => "Contratos - Nova Comissao",
                'contrato'        =>  $historico->contrato,
                'historico'         => $historico
            ];
            return view('admin.contratos.includes.comissao',$dados);
        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function editar($id,$historico_id,$comissao_id)
    {
        try {
            $dados = [
                'titulo' => "Contratos - Nova Comissao",
            ];

            $historico          =   Historico::find($historico_id);
            if($historico == null){
                return "historico inexistente";
            }
            if($historico->contrato->id != $id  ){
                return "Contrato inexistente";
            }


            $comissao       =   Comissao::find($comissao_id);
            if($comissao == null){
                return "comissao inexistente";
            }

            $dados = [
                'titulo'            => "Contratos - Nova Comissao",
                'contrato'          =>  $historico->contrato,
                'historico'         => $historico,
                'comissao'          =>  $comissao
            ];
            return view('admin.contratos.includes.comissao',$dados);
        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function cadastrar(ComissaoRequest $r)
    {
        try{
            $comissao           =   new Comissao();
            $comissao->fornecedor_id    =   $r->get('fornecedor');
            $comissao->historico_id     =   $r->get('historico');
            $comissao->valor            =   $r->get('valor');
            $comissao->obs              =   $r->get('obs');
            $comissao->data             =   Carbon::createFromFormat('d/m/Y',$r->get('data'));


            if($comissao->save()){

                return redirect()->route('contrato.editar.comissao',['id'=>$r->get('contrato'),'historico_id'=>$r->get('historico'),'comissao_id'=>$comissao->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);
            }


        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function atualizar(ComissaoRequest $r)
    {
        try{
            $comissao               =   Comissao::find($r->get('comissao_id'));
            $comissao->fornecedor_id    =   $r->get('fornecedor');
            $comissao->historico_id     =   $r->get('historico');
            $comissao->valor            =   $r->get('valor');
            $comissao->obs              =   $r->get('obs');
            $comissao->data             =   Carbon::createFromFormat('d/m/Y',$r->get('data'));

            if($comissao->save()){

                return redirect()->route('contrato.editar',['id'=>$r->get('contrato'),'historico_id'=>$r->get('historico'),'pagina'=>'comissao'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);
            }


        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function excluir(Request $r,$id,$historico_id,$comissao_id)
    {
        try{
            $comissao           =   Comissao::find($comissao_id);
            if($comissao == null){
                return "comissao inexistente";
            }
            if($comissao->delete()){
                return redirect()->route('contrato.editar',['id'=>$id,'historico_id'=>$historico_id,'pagina'=>'comissao'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);
            }

        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
