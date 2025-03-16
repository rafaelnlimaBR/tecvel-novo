<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Token;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{

    public function teste($telefone,$mensagem){

        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "http://104.251.210.46:8081/message/sendText/tecvel",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"text\": \"$mensagem\",\n  \"number\": \"55".$telefone."\"\n}",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "apikey: mmcVlmdaaGljY9s8NfH7wEde3HQMQtHg"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
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
