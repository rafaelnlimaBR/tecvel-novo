<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $r){
        $dados = [
            'titulo' => "Status",
            'titulo_tabela' => "Lista de Status"
        ];
        $status   =   Status::all();

        return view('admin.status.index',$dados)->with('status',$status);
    }

    public function editar($id){
        try {
            $status          =   Status::find($id);
            if($status == null){
                return redirect()->route('status.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Status não existe."]);
            }

            $dados = [
                'titulo' => "Editar Status",
                'status' =>  $status
            ];
            return view('admin.status.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('status.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo' => "Nova Status",

        ];
        return view('admin.status.formulario',$dados);
    }

    public function cadastrar(Request $r){
        try {
            $status          =   new Status();
            $status->nome    =   $r->get('nome');
            $status->cor_fundo  =   $r->get('cor-fundo');
            $status->cor_letra  =   $r->get('cor-letra');
            $status->cobrar  =   $r->get('cobrar');
            $status->habilitar_funcoes  =   $r->get('funcoes');


            if($status->save()){
                return redirect()->route('status.editar',['id'=>$status->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Status cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('status.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function atualizar(Request $r){
        try {
            $status          =   Status::find($r->get('id'));
            $status->nome    =   $r->get('nome');
            $status->cor_fundo  =   $r->get('cor-fundo');
            $status->cor_letra  =   $r->get('cor-letra');
            $status->cobrar  =   $r->get('cobrar');
            $status->habilitar_funcoes  =   $r->get('funcoes');


            if($status->save()){
                return redirect()->route('status.editar',['id'=>$status->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Status atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('status.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function vincularStatus(Request $r)
    {
        try {

            $status         =   Status::find($r->get('id'));

            $proximo        =   $r->get('status_proximo');
            $status->proximosStatus()->attach($proximo);

            return response()->json([
                'status'=>view('admin.status.includes.table',['status'=>$status])->render()
            ]);

        } catch (Exception $e) {
            return \response()->json(['errors'=>$e->getMessage()]);
        }
    }

    public function desvincularStatus(Request $r)
    {
        try {

            $status         =   Status::find($r->get('id'));

            $proximo        =   $r->get('proximo');
            $status->proximosStatus()->detach($proximo);

            return response()->json([
                'status'=>view('admin.status.includes.table',['status'=>$status])->render()
            ]);

        } catch (Exception $e) {
            return \response()->json(['errors'=>$e->getMessage()]);
        }
    }

    public function excluir(){

    }
}
