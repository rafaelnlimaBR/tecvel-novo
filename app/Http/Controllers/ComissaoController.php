<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComissaoRequest;
use App\Models\Comissao;
use App\Models\Fornecedor;
use App\Models\Historico;
use App\Models\Saida;
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

            foreach ($comissao->saidas as $saida){
                $saida->delete();
            }

            if($comissao->delete()){
                return redirect()->route('contrato.editar',['id'=>$id,'historico_id'=>$historico_id,'pagina'=>'comissao'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);
            }

        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function novoPagamento(Request $r,$id,$historico_id,$comissao_id)
    {
        try{

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
                'titulo'            => "Contratos - Novo Pagamento ",
                'contrato'          =>  $historico->contrato,
                'historico'         => $historico,
                'comissao'          =>  $comissao,
                'foreignkey'        =>  $comissao->id,
                'routeBack'=>route('contrato.editar.comissao',['id'=>$historico->contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id]),
                'routeAction'=>route('comissao.salvar.pagamento'),
                'routeUpdate'=>route('comissao.atualizar.pagamento'),
            ];
            return view('admin.contratos.includes.form-comissao-saida',$dados);


        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function editarPagamento(Request $r,$id,$historico_id,$comissao_id,$pagamento_id)
    {
        try{

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
            $pagamento      =   Saida::find($pagamento_id);
            if($pagamento == null){
                return "pagamento inexistente";
            }

            $dados = [
                'titulo'            => "Contratos - Editar Pagamento ",
                'contrato'          =>  $historico->contrato,
                'historico'         => $historico,
                'comissao'          =>  $comissao,
                'saida'             =>  $pagamento,
                'foreignkey'        =>  $comissao->id,
                'routeBack'=>route('contrato.editar.comissao',['id'=>$historico->contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id,'pagina'=>'pagamentos']),
                'routeAction'=>route('comissao.salvar.pagamento'),
                'routeUpdate'=>route('comissao.atualizar.pagamento'),
            ];
            return view('admin.contratos.includes.form-comissao-saida',$dados);

        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function salvarPagamento(Request $r)
    {
        try {

            $comissao       =   Comissao::find($r->get('foreignkey'));
            $contrato       =   $comissao->historico->contrato;
            $historico       =   $comissao->historico;

            $saida      =   new Saida();
            $saida      =   $saida->salvar($r->get('valor'),$r->get('data'),$r->get('obs'));
            if($saida != null){
                $comissao->saidas()->attach($saida);
                return redirect()->route('contrato.editar.comissao',['id'=>$contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id,'pagina'=>'pagamentos'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);
            }


        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function atualizarPagamento(Request $r)
    {
        try {


            $comissao       =   Comissao::find($r->get('foreignkey'));
            $contrato       =   $comissao->historico->contrato;
            $historico       =   $comissao->historico;

            $saida      =   new Saida();
            $saida->atualizar($r->get('saida_id'),$r->get('valor'),$r->get('data'),$r->get('obs'));

            return redirect()->route('contrato.editar.comissao',['id'=>$contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id,'pagina'=>'pagamentos'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);


        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function excluirPagamento($id,$historico_id,$comissao_id,$saida_id)
    {
        try{

            $comissao           =   Comissao::find($comissao_id);
            $saida             =    Saida::find($saida_id)  ;

            $saida->delete();

            return redirect()->route('contrato.editar.comissao',['id'=>$id,'historico_id'=>$historico_id,'comissao_id'=>$comissao->id,'pagina'=>'pagamentos'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);

        }catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
