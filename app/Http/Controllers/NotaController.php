<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function novo($id,$historico_id)
    {
        try{
            $contrato   =   Contrato::find($id);
            $dados = [
                'titulo'        => "Nova Nota",
                'contrato'      =>   $contrato,
                'historico_id'   => $historico_id
            ];
            if($contrato==null){
                return redirect()->route('contratos.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>'Contrato não existe']);
            }
            return view('admin.contratos.includes.nota',$dados);


        }catch (\Exception $e){
            return redirect()->route('contratos.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function editar($id,$historico_id,$nota_id)
    {
        try{
            $contrato   =   Contrato::find($id);
            $nota       =   Nota::find($nota_id);
            $dados = [
                'titulo'        => "Nova Nota",
                'contrato'      =>   $contrato,
                'nota'          =>  $nota
            ];
            if($contrato==null or $nota ==null){
                return redirect()->route('contratos.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>'Contrato ou nota não existem']);
            }
            return view('admin.contratos.includes.nota',$dados);


        }catch (\Exception $e){
            return redirect()->route('contratos.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function cadastrar(Request $r)
    {
        try{
            $contrato       =   Contrato::find($r->get('contrato_id'));

            $nota                   =   new Nota();
            $nota->texto            =   $r->get('texto');
            $nota->historico_id     =   $r->get('historico');
            $nota->tipo_nota_id          =   $r->get('tipo_nota');

            if($nota->save()){
                return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Pagamento registrado com sucesso"]);
            }



        }catch (\Exception $e){
            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'notas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }

    public function atualizar()
    {

    }
}
