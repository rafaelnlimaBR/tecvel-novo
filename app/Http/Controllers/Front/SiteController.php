<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Token;
use App\Models\Whatsapp;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{

    public function teste($telefone,$mensagem){


        $whatsapp       =   new Whatsapp();
        $whatsapp->enviarMensagem($mensagem,$telefone);



    }


    public function index(){


    }

    public function home(){

    }

    public function contrato($token,$id)
    {
        try{
            $dados = [
                'titulo' => "Garantia",
            ];

            $contrato   =   Contrato::find($id);
            if(is_null($contrato)){
                return "Contrato inexistente";
            }

            $contrato->validarToken($token);

            return view('front.contrato', $dados)->with('contrato', $contrato);




        }catch (\Exception $e){
            return view('front.contrato', $dados)->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);

        }

        
    }
}
