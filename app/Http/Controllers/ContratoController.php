<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use App\Models\Modelo;
use App\Models\Montadora;
use App\Models\Contrato;
use App\Models\Historico;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index(Request $r){
        $dados = [
            'titulo' => "Contratos",
            'titulo_tabela' => "Lista de Modelos"
        ];
        $contratos   =   Contrato::
            orderBy('created_at', 'desc')
            ->paginate(2)->
            withQueryString();
        return view('admin.contratos.index',$dados)->with('contratos',$contratos);
    }

    public function editar($id){
        try {
            $contrato          =   Contrato::find($id);
            if($contrato == null){
                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Contrato não existe."]);
            }

            $dados = [
                'titulo'        => "Editar Contrato",
                'contrato'        =>  $contrato,


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
            return redirect()->route('contrato.editar',['id'=>$contrato->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato cadastrado com sucesso."]);
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
                return redirect()->route('contrato.editar',['id'=>$contrato->id,'pagina'=>'dados'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }



    public function excluir(){

    }
}
