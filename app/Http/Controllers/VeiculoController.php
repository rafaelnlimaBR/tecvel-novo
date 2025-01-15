<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Montadora;
use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{

    public function index(Request $r){
        $dados = [
            'titulo' => "Veiculos",
            'titulo_tabela' => "Lista de Veiculos",

        ];
        $veiculos   =   Veiculo::pesquisarPorPlaca($r->get('placa'))
            ->orderBy('created_at', 'desc')
            ->paginate(15)->
            withQueryString();
        return view('admin.veiculos.index',$dados)->with('veiculos',$veiculos);
    }

    public function editar($id){
        try {
            $veiculo          =   Veiculo::find($id);
            if($veiculo == null){
                return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Veiculo não existe."]);
            }

            $dados = [
                'titulo' => "Editar Veiculo",
                'veiculo' =>  $veiculo,
                'modelos'   =>  Modelo::all(),
                'montadoras'   =>  Montadora::all(),
                'cores'         =>  Veiculo::$cores
            ];
            return view('admin.veiculos.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo' => "Nova Veiculo",
            'modelos'   =>  Modelo::all(),
            'montadoras'   =>  Montadora::all(),
            'cores'     =>  Veiculo::$cores
        ];
        return view('admin.veiculos.formulario',$dados);
    }

    public function cadastrar(Request $r){
        try {

            $veiculo          =   new Veiculo();
            $veiculo->placa    =   $r->get('placa');
            $veiculo->ano    =   $r->get('ano');
            $veiculo->cor    =   $r->get('cor');
            $modelo             =   Modelo::PesquisarPorNome($r->get('modelo'))->first();
            if($modelo == null){
                $modelo         =   new Modelo();
                $modelo->nome   =   $r->get('modelo');
                $modelo->montadora_id   =   $r->get('montadora');
                $modelo->save();
            }
            $veiculo->modelo_id     =   $modelo->id;


            if($veiculo->save()){
                return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Veiculo cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function atualizar(Request $r){
        try {
            $veiculo                =   Veiculo::find($r->get('id'));
            $veiculo->placa         =   $r->get('placa');
            $veiculo->ano           =   $r->get('ano');
            $veiculo->cor           =   $r->get('cor');
            $modelo                 =   Modelo::PesquisarPorNome($r->get('modelo'))->first();
            if($modelo == null){
                $modelo         =   new Modelo();
                $modelo->nome   =   $r->get('modelo');
                $modelo->montadora_id   =   $r->get('montadora');
                $modelo->save();
            }
            $veiculo->modelo_id     =   $modelo->id;



            if($veiculo->save()){
                return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Veiculo atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(){

    }
}
