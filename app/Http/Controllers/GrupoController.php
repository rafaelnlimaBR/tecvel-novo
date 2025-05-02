<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Permissao;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index(Request $r){
        $dados = [
            'titulo' => "Grupos",
            'titulo_tabela' => "Lista de Grupos"
        ];
        $grupos   =   Grupo::all();

        return view('admin.grupos.index',$dados)->with('grupos',$grupos);
    }

    public function editar(Grupo $grupo){
        try {

            if($grupo == null){
                return redirect()->route('Grupo.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Grupo não existe."]);
            }

            $dados = [
                'titulo' => "Editar Grupo",
            ];
            return view('admin.grupos.formulario',$dados)->with('grupo',$grupo);



        } catch (\Throwable $th) {
            return redirect()->route('Grupo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo' => "Nova Grupo",

        ];
        return view('admin.grupos.formulario',$dados);
    }

    public function cadastrar(Request $r){


            $validacao      =   $r->validate([
                'nome'  =>  ['required','min:3','max:100','unique:grupos,nome'],
            ]);

            $Grupo          =   new Grupo();
            $Grupo->nome    =   $r->get('nome');
            $Grupo->admin   =   $r->get('admin');


            if($Grupo->save()){
                $Grupo->permissoes()->sync($r->get('permissoes'));
                return redirect()->route('Grupo.editar',['id'=>$Grupo->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Grupo cadastrado com sucesso."]);
            }



    }

    public function atualizar(Request $r){
        try {
            $Grupo          =   Grupo::find($r->get('id'));
            $Grupo->nome    =   $r->get('nome');
            $Grupo->admin   =   ($r->get('admin')==1?true:false);

            if($Grupo->save()){
                $Grupo->permissoes()->sync($r->get('permissoes'));
                return redirect()->route('grupo.editar',['grupo'=>$Grupo])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Grupo atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(){

    }

    public function modelos($id)
    {
        return response()->json(Grupo::find($id)->modelos);
    }

}
