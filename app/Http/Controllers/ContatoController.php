<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use Exception;

class ContatoController extends Controller
{

    public function cadastrar($numero, $responsavel, $app_id){
        try {
            $contato    =   new contato();
            $contato->numero  =   $numero;
            $contato->responsavel =   $responsavel;
            $contato->app_id        =   ($app_id == 0)?null:$app_id;
            if($contato->save()){
                return $contato->id;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
}
