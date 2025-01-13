<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use Exception;

class ContatoController extends Controller
{

    public static function cadastrar($numero, $app_id){

            $contato                =   Contato::where(['numero'=>$numero]);
            if($contato->exists()){

                return $contato->first()->id;
            }else{
                $contato    =   new Contato();
            }
            $contato->numero        =   $numero;
            $contato->app_id        =   $app_id;
            if($contato->save()){
                return $contato->id;
            }

            return new Exception('Erro ao cadastrar Contato');

    }


    public static function atualizar($id,$numero, $app_id){




            $contato             =   Contato::where('numero',$numero);
            if($contato->exists()){
                $id = $contato->first()->id;
                $contato            =   Contato::find($id);

            }else{
                $contato            =   Contato::find($id);
                $contato->numero        =   $numero;
            }




            $contato->app_id        =   $app_id;

            if($contato->save()){
                return $contato;
            }
            return new Exception('Erro ao atualizar Contato');
    }


}
