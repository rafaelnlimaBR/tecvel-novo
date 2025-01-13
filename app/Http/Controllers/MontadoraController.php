<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Montadora;


class MontadoraController extends Controller
{
    public function index(Request $r){
        $dados = [
            'titulo' => "Montadoras",
            'titulo_tabela' => "Lista de Montadoras"
        ];
        $montadoras   =   Montadora::pesquisarPorNome($r->get('nome'))
                                ->orderBy('created_at', 'desc')
                                ->paginate(15)->
                                withQueryString();
        return view('admin.montadoras.index',$dados)->with('montadoras',$montadoras);
    }

    public function editar($id){
        try {
            $montadora          =   Montadora::find($id);
            if($montadora == null){
                return redirect()->route('montadora.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Montadora não existe."]);
            }

            $dados = [
                'titulo' => "Editar Montadora",
                'montadora' =>  $montadora
            ];
            return view('admin.montadoras.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('montadora.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo' => "Nova Montadora",

        ];
        return view('admin.montadoras.formulario',$dados);
    }

    public function cadastrar(Request $r){
        try {
            $montadora          =   new Montadora();
            $montadora->nome    =   $r->get('nome');


            if($montadora->save()){
                return redirect()->route('montadora.editar',['id'=>$montadora->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Montadora cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('montadora.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function atualizar(Request $r){
        try {
            $montadora          =   Montadora::find($r->get('id'));
            $montadora->nome    =   $r->get('nome');


            if($montadora->save()){
                return redirect()->route('montadora.editar',['id'=>$montadora->id])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Montadora atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('montadora.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(){

    }
}
