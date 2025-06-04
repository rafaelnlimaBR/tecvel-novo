<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Postagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    public function editar(Postagem $postagem, Comentario $comentario)
    {
        $dados = [
            'titulo' => "Nova Categoria",
            'comentario' =>  $comentario,
            'postagem'  =>$postagem
        ];
        return view('admin.comentarios.formulario',$dados);
    }

    public function responder(Request $request, Comentario $comentario)
    {
        try{
            $validacao = Validator::make($request->all(),[
                'resposta' => 'required'
            ]);

            if($validacao->fails()){
                return redirect()->back()->withErrors($validacao)->withInput();
            }

            $resposta       = new Comentario();
            $resposta->cadastrar($request->get('resposta'));
            $comentario->resposta($resposta);

            return redirect()->back()->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Comentario respondido com sucesso!."]);
        }catch (\Exception $e){

        }
    }

    public function excluir(Postagem $postagem,Comentario $comentario)
    {

        $comentario->excluir();
        return redirect()->route('postagem.editar',['postagem'=>$postagem,'pagina'=>'comentarios'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Comentario excluido com sucesso!."]);

    }
}
