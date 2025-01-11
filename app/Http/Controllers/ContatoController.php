<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use Exception;

class ContatoController extends Controller
{

    public function cadastrar($numero, $responsavel, $app_id){

            $contato    =   new contato();
            $contato->numero  =   $numero;
            $contato->responsavel =   $responsavel;
            $contato->app_id        =   ($app_id == 0)?null:$app_id;
            if($contato->save()){
                return $contato->id;
            }

            return new Exception('Erro ao cadastrar Contato');

    }


    public function atualizar($id,$numero, $responsavel, $app_id){

            $contato            =   Contato::find($id);
            if($contato == null){
                return new Exception('Contato não existe');
            }
            $contato->numero        =   $numero;
            $contato->responsavel   =   $responsavel;
            $contato->app_id        =   ($app_id == 0)?null:$app_id;

            if($contato->save()){
                return $contato->id;
            }
            return new Exception('Erro ao atualizar Contato');
    }
}
