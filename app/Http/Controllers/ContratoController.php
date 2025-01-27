<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use App\Models\MaoObra;
use App\Models\Montadora;
use App\Models\Contrato;
use App\Models\Historico;
use App\Models\Servico;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\get;

class ContratoController extends Controller
{
    public function index(Request $r){
        $dados = [
            'titulo' => "Contratos",
            'titulo_tabela' => "Lista de Contratos"
        ];
        $contratos = "";
        if($r->get('placa') == null){
            $contratos   =   Contrato::pesquisarPorCliente($r->input('nome'))->PesquisarPorTelefone($r->input('telefone'))->
            orderBy('created_at', 'desc')
                ->paginate(10)->
                withQueryString();
        }else{
            $contratos   =   Contrato::pesquisarPorCliente($r->input('nome'))->PesquisarPorTelefone($r->input('telefone'))->PesquisarPorPlaca($r->input('placa'))->
            orderBy('created_at', 'desc')
                ->paginate(10)->
                withQueryString();
        }

        return view('admin.contratos.index',$dados)->with('contratos',$contratos);
    }

    public function editar($id,$historico_id){
        try {
            $contrato          =   Contrato::find($id);
            $historico          =    Historico::find($historico_id);

            if($contrato == null ){

                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Contrato não existe."]);
            }
            if($historico == null ){

                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Historico não existe."]);
            }
            if($contrato->historicos->contains($historico_id) == false){
                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Histórico não é desse contrato."]);
            }

            $dados = [
                'titulo'        => "Editar Contrato",
                'contrato'        =>  $contrato,
                'historico'         => $historico


            ];



            return view('admin.contratos.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo'        => "Nova Contrato",
            'contratos'    =>  Montadora::all(),
            'pagina'        => 'dados'

        ];
        return view('admin.contratos.formulario',$dados);
    }

    public function cadastrar(Request $r){
        try {

            $contrato                       =   new Contrato();
            $contrato->cliente_id           =   $r->get('cliente');
            $contrato->veiculo_id           =   $r->get('veiculo');
            $contrato->obs                  =   $r->get('obs');
            $contrato->defeito              =   $r->get('defeito');
            $contrato->solucao              =   $r->get('solucao');
            $contrato->garantia             =   Carbon::createFromFormat('d/m/Y',$r->get('garantia'));

            if($contrato->save()){
                $status             =   Status::find(Configuracao::first()->abertura);
                $contrato->status()->attach($status,['obs'=>$r->get('obs'),'data'=>Carbon::now()->format('Y-m-d')]);
            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->status->last()->pivot->id,'pagina'=>'dados'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function atualizar(Request $r){
        try {
            $contrato                       =   Contrato::find($r->get('id'));
            $contrato->cliente_id           =   $r->get('cliente');
            $contrato->veiculo_id           =   $r->get('veiculo');
            $contrato->obs                  =   $r->get('obs');
            $contrato->defeito              =   $r->get('defeito');
            $contrato->solucao              =   $r->get('solucao');
            $contrato->garantia             =   Carbon::createFromFormat('d/m/Y',$r->get('garantia'));

            if($contrato->save()){
                return redirect()->route('contrato.editar',['id'=>$contrato->id,"historico_id"=>$r->get('id_historico'),'pagina'=>'dados'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }



    public function excluir(){

    }

    public function mudarStatus(Request $r)
    {
        try {
            $contrato                       =   Contrato::find($r->get('id_contrato'));
            $contrato->status()->attach($r->get('id_status'),['obs'=>$r->get('obs'),'data'=>Carbon::now()->format('y-m-d')]);

            return redirect()->route('contrato.editar',['id'=>$contrato->id,"historico_id"=>$contrato->historicos->last()->id,'pagina'=>'dados'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);



        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function adicionarServico(Request $r)
    {

        try {
            $historico_atual                =   $r->get('historico_id');
            $historico                      =   Historico::find($historico_atual);
            $contrato                       =    $historico->contrato;
            $historico->servicos()->attach($r->get('servico'),['valor'=>$r->get('valor'),'data'=>Carbon::now(),'cobrar'=>$r->get('cobrar')]);

            return response()->json(['servico'=>view("admin.contratos.includes.tabela-servico",['contrato'=>$contrato])->render()]);

        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }
    }

    public function removerServico(Request $r)
    {
        try {
            $historico_id                   =   $r->get('historico_id');
            $servico_id                     =   $r->get('servico_id');
            $historico                      =   Historico::find($historico_id);
            $contrato                       =    $historico->contrato;
            $maoObra                        =   MaoObra::find($servico_id);

            if ($maoObra->delete()){
                return response()->json(['servico'=>view("admin.contratos.includes.tabela-servico",['contrato'=>$contrato])->render()]);
            }




        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }
    }

    public function atualizarServico(Request $r)
    {
        try {
//            return response()->json($r->all());
            $servico                =       MaoObra::find($r->get('servico_id'))   ;
            $servico->valor         =      $r->get('valor');
            $servico->cobrar        =       ($r->get('cobrar')=="1"?true:false);
            $servico->data          =   Carbon::now();
            $contrato       =   Contrato::find($r->get('contrato_id'));

            if($servico->save()){
                return response()->json(['servico'=>view("admin.contratos.includes.tabela-servico",['contrato'=>$contrato])->render()]);
            }


        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }

    }
}
