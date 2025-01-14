<?php

namespace App\Http\Controllers;

use App\Models\Montadora;
use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index(Request $r){
        $dados = [
            'titulo' => "Modelos",
            'titulo_tabela' => "Lista de Modelos"
        ];
        $modelos   =   Modelo::pesquisarPorNome($r->get('nome'))
            ->orderBy('created_at', 'desc')
            ->paginate(15)->
            withQueryString();
        return view('admin.modelos.index',$dados)->with('modelos',$modelos);
    }

    public function editar($id){
        try {
            $modelo          =   Modelo::find($id);
            if($modelo == null){
                return redirect()->route('modelo.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Modelo não existe."]);
            }

            $dados = [
                'titulo'        => "Editar Modelo",
                'modelo'        =>  $modelo,
                'montadoras'    =>  Montadora::all()
            ];
            return view('admin.modelos.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo'        => "Nova Modelo",
            'montadoras'    =>  Montadora::all()

        ];
        return view('admin.modelos.formulario',$dados);
    }

    public function cadastrar(Request $r){
        try {
            $modelo                 =   new Modelo();
            $modelo->nome           =   $r->get('nome');
            $modelo->montadora_id   =   $r->get('montadora');


            if($modelo->save()){
                return redirect()->route('modelo.editar',['id'=>$modelo->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Modelo cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function atualizar(Request $r){
        try {
            $modelo          =   Modelo::find($r->get('id'));
            $modelo->nome    =   $r->get('nome');
            $modelo->montadora_id   =   $r->get('montadora');

            if($modelo->save()){
                return redirect()->route('modelo.editar',['id'=>$modelo->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Modelo atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(){

    }
}
