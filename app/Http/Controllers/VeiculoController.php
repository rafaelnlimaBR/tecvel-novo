<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Montadora;
use Illuminate\Http\Request;
use App\Models\Veiculo;
use Illuminate\Support\Facades\Validator;


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
        ];
        return view('admin.veiculos.formulario',$dados);
    }

    public function cadastrar(Request $r)
    {

        try {
        $validacao = Validator::make($r->all(),[
            'placa' => 'required|unique:veiculos,placa',
            'modelo' => 'required',
            'ano' => 'required',
            'cor' => 'required',
        ]);


            if($validacao->fails()){
                if ($r->has('modal')) {
                    $hmtl   =   view('admin.veiculos.includes.form')->withErrors($validacao)->with($r->all())->render();
                    return response()->json(['form_veiculo'=>$hmtl,'error'=>true]);
                }else{
                    return redirect()->back()->withErrors($validacao)->withInput();
                }


            }
//            return $r->all();
            $modelo = Modelo::PesquisarPorNome($r->get('modelo'))->first();
            if ($modelo == null) {
                $modelo = new Modelo();
                $modelo->nome = $r->get('modelo');
                $modelo->montadora_id = $r->get('montadora');
                $modelo->save();
            }
            $veiculo = new Veiculo();
            $veiculo = $veiculo->gravar(
                $r->get('placa'),
                $modelo,
                $r->get('ano'),
                $r->get('cor')
            );
            if ($veiculo == null) {
                return redirect()->route('veiculo.index')->with('alerta', ['tipo' => 'danger', 'icon' => '', 'texto' => "Erro ao cadastrar veiculo."]);
            }


            $veiculo->modelo_id = $modelo->id;


            if ($veiculo != null) {
                if ($r->has('modal')) {
                    return response()->json($veiculo);
                } else {
                    return redirect()->route('veiculo.index')->with('alerta', ['tipo' => 'success', 'icon' => '', 'texto' => "Veiculo cadastrado com sucesso."]);
                }

            }


        }catch (\Exception $th) {
            if($r->has('modal')){
                return response()->json(['errors'=>$th->getMessage()]);
            }else{
                return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
            }

        }
    }

    public function atualizar(Request $r,Veiculo $veiculo){


        try {
            $validacao = Validator::make($r->all(),[
                'placa' => 'required|unique:veiculos,placa,'.$veiculo->id,
                'modelo' => 'required',
                'ano' => 'required',
                'cor' => 'required',
            ]);

            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput();
            }
            $modelo                 =   Modelo::PesquisarPorNome($r->get('modelo'))->first();

            if($modelo == null){
                $modelo         =   new Modelo();
                $modelo->nome   =   $r->get('modelo');
                $modelo->montadora_id   =   $r->get('montadora');
                $modelo->save();
            }


            $veiculo                =   $veiculo->gravar(
                $r->get('placa'),
                $modelo,
                $r->get('ano'),
                $r->get('cor')
            );

            if($veiculo == null){
                return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>'Erro ao atualizar veiculo.']);
            }

            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Veiculo atualizado com sucesso."]);


        } catch (\Throwable $th) {
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(Veiculo $veiculo){
        try{
            if($veiculo->excluir()){
                return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Veiculo excluido com sucesso."]);
            }
        }catch (\Throwable $th) {
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }


    }

    public function veiculosJson(Request $r)
    {
        try{


            $veiculos = Veiculo::pesquisarPorPlaca($r->get('q'))->orderBy('created_at', 'desc')->limit(20)->get();


            $retorno    =   [];

            foreach ($veiculos as $key => $value) {

                $retorno[$key]['id'] = $value->id;
                $retorno[$key]['placa'] = $value->placa;
                $retorno[$key]['text'] = $value->placa.' - '.$value->modelo->nome;
                $retorno[$key]['modelo'] = $value->modelo->nome;

                $retorno[$key]['montadora'] = $value->modelo->montadora->nome;

            }
            return response()->json($retorno);

        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }

    }
}
