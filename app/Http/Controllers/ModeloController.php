<?php

namespace App\Http\Controllers;

use App\Models\Montadora;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Mod;

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

    public function editar(Modelo $modelo){
        try {

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
            $validacao  =   Validator::make($r->all(),[
                'nome'      =>  'required|min:3|max:100',
                'montadora'    =>  'required',
            ]);

            if($validacao->fails()){
                return redirect()->back()->withInput()->withErrors($validacao);
            }

            $modelo                 =   new Modelo();
            $modelo                 =   $modelo->gravar($r->get('nome'), Montadora::find($r->input('montadora')));

            if($modelo  == null){
                return redirect()->back()->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>"Erro ao cadastrar Modelo."]);
            }
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Modelo cadastrado com sucesso."]);




        } catch (\Throwable $th) {
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function atualizar(Request $r, Modelo $modelo){
        try {

            $validacao  =   Validator::make($r->all(),[
                'nome'      =>  'required',
                'montadora'    =>  'required',
            ]);

            if($validacao->fails()){
                return redirect()->back()->withInput()->withErrors($validacao);
            }

            $modelo     =   $modelo->gravar($r->get('nome'), Montadora::find($r->input('montadora')));

            if($modelo == null){
                return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>"Erro ao atualizar Modelo."]);
            }

            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Modelo atualizado com sucesso."]);



        } catch (\Throwable $th) {
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function excluir(Request $r, Modelo $modelo){
        try{
            if($modelo->delete()){
                return redirect()->route('modelo.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>'Excluido com sucesso']);
            }
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>'Erro ao excluir']);

        }catch (\Throwable $th) {
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function Json($id)
    {
        $modelo     =   Modelo::find($id);
        $modeloJson =   ['modelo'=>$modelo->nome,'montadora'=>$modelo->montadora->nome];
        return response()->json($modeloJson);

        return response()->json($modelo->montadora);
    }
}
